<?php
    
    // This would be split into two functions
    function get_assignments_by_course($course_id) {
        // What does this line
        global $db;

        if($course_id) {
            $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A LEFT JOIN courses C 
            ON A.courseID = C.courseID WHERE A.courseID = :course_id';

        } else {
            $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A LEFT JOIN courses C 
            ON A.courseID = C.courseID';
        }

        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();
        return $assignments;
    }

    function delete_assignment($assignment_id) {
        global $db;
        $query = 'DELETE FROM assigments WHERE ID = :assign_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_assignment($course_id, $description) {
        global $db;
        $query = 'INSERT INTO assignments (Description, CourseID) VALUES(:descr, :courseID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':descr', $description);
        $statement->bindValue(':courseID', $course_id);
        $statement->execute();
        $statement->closeCursor();
    }