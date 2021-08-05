<?php
namespace Model;
class Advice {
    // The plan is to make it so that only the admin can insert advices that can be viewed on the advice page
    // should there be a detailed page that when an advice is selected it will redirect to an another page contain the details of the topic
    // or should the page just have simple advices to list through.

    // what should the advice table have
    // subject, date, content
    // what about images since it is linked to a user profile, should I just get rid of the images

    // make a search query to look for subjects
    public function addAdvice($subject, $date, $content){
        $sql = "INSERT INTO advice (subject, date, content)
                VALUES (:subject, :date, :content)";
        $pst = $db->prepare($sql);
    }

    public function getAllAdvice($dbcon){
        // list all advice content that only users and non users can view
    }
}