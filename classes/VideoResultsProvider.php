<?php
class VideoResultsProvider {

	private $con;

	public function __construct($con) {
		$this->con = $con;
	}

	public function getNumResults($term) {

		$query = $this->con->prepare("SELECT COUNT(*) as total 
										 FROM videos 
										 WHERE (title LIKE :term 
										 OR alt LIKE :term)
										 AND broken=0");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		return $row["total"];

	}

	public function getResultsHtml($page, $pageSize, $term) {

		$fromLimit = ($page - 1) * $pageSize;

		$query = $this->con->prepare("SELECT * 
										 FROM videos 
										 WHERE (title LIKE :term 
										 OR alt LIKE :term)
										 AND broken=0
										 ORDER BY clicks DESC
										 LIMIT :fromLimit, :pageSize");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->bindParam(":fromLimit", $fromLimit, PDO::PARAM_INT);
		$query->bindParam(":pageSize", $pageSize, PDO::PARAM_INT);
		$query->execute();


		$resultsHtml = "<div class='videoResults'>";

		$count = 0;
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$count++;
			$id = $row["id"];
			$videoUrl = $row["videoUrl"];
			$siteUrl = $row["siteUrl"];
			$title = $row["title"];
			$alt = $row["alt"];

			if($title) {
				$displayText = $title;
			}
			else if($alt) {
				$displayText = $alt;
			}
			else {
				$displayText = $videoUrl;
			}
			
			$resultsHtml .= "<div class='videoplayer'>
								<video controls><source src='{$videoUrl}' type='video/mp4'></video>
								<span class='details'>$displayText</span>
							</div>";
		}
		$resultsHtml .= "</div>";

		return $resultsHtml;
	}

}
?>