<?php
    class review {
 
        public $id;
        public $title;
        public $content;
        public $grade;
        public $userID;

        public function __construct($id = null, $title = null, $content, $grade=null, $userID = null){
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->grade = $grade;
            $this->userID = $userID;
        }

        public static function deleteById($id, mysqli $conn)
        {
            $q = "DELETE FROM movie_review.review WHERE movie_review.review.id='$id'";
            return $conn->query($q);
        }

        public static function add($title, $content, $userID, mysqli $conn)
        {
            $q = "INSERT INTO movie_review.review(title, content, grade, userID) VALUES('$title', '$content', 0, '$userID')";
            return $conn->query($q); 
        }

        public static function getByUserId($userID, mysqli $conn){
            $q = "SELECT id, title, content, grade FROM movie_review.review WHERE userID='$userID'";
            return $conn->query($q); 
        }

        public static function getAll(mysqli $conn){
            $q = "SELECT b.id, b.title, b.content, b.grade, u.username FROM movie_review.review b JOIN movie_review.user u ON b.userID=u.id";
            return $conn->query($q); 
        }

        public static function getReview($id, mysqli $conn){
            $q = "SELECT b.id, b.title, b.content, b.grade FROM movie_review.review b WHERE id='$id'";
            return $conn->query($q); 
        }

        public static function like($id, $grade, mysqli $conn){
            $q = "UPDATE movie_review.review SET grade='$grade' WHERE id='$id'";
            return $conn->query($q); 
        }

        public static function getGrade($id, mysqli $conn){
            $q = "SELECT grade FROM movie_review.review WHERE id='$id'";
            return $conn->query($q); 
        }
    }
?>