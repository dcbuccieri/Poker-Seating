<?php

    // config
    require("includes/config.php");
    
    // if user got here via GET
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //else render form
        render("register_form.php", array("title" => "Register"));
    }
    
    // register user if they got here by post
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            apologize("You must fill in a username");
        }
        if (empty($_POST["password"]))
        {
            apologize("You must fill in a password");
        }
        if (empty($_POST["confirmation"]))
        {
            apologize("You must fill in the Confirm field");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match!");
        }
        else
        {
            $rows = query("INSERT INTO seatingUsers (username, hash) VALUES (?, ?)", $_POST["username"], crypt($_POST["password"]));
            if ($rows === false)
            {
                apologize("Username is already taken");
            }
            $row = query("SELECT LAST_INSERT_ID() AS id");
            $_SESSION["id"] = $row[0]["id"];
            redirect("/pset7/public/index.php");
        }
        
    }
