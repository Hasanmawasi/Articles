<?php

require_once '../../connection/connection.php'; 
$sql = "INSERT INTO qas(quetion,answer) values(?,?);";
if($stmt-> $mysqli->prepare($sql)){

    $questions = [
        "qas" => [
            ["What is SDLC?", "SDLC stands for Software Development Lifecycle. It defines the stages of software development."],
            ["What are the three broad categories of software development?", "1. Back-end functionality software 2. Service software for end-users or applications 3. GUI-based software"],
            ["What are the three types of SDLC models discussed?", "1. Linear models 2. Iterative models 3. Combination of linear & iterative models"],
            ["Who first documented the Waterfall Model?", "The Waterfall Model was first documented by H.D. Benington in 1956 and later modified by Winston Royce in 1970."],
            ["What major improvement did Winston Royce make to the Waterfall Model?", "He introduced feedback loops, allowing developers to revisit previous stages when necessary, making the model more flexible."],
            ["What are the key phases of the Waterfall Model?", "1. Requirements gathering 2. Preliminary design 3. Detailed design 4. Coding and unit testing 5. System integration and testing 6. Deployment and maintenance"],
            ["What is the B-Model, and why was it introduced?", "The B-Model is an extension of the Waterfall Model that includes a maintenance cycle, ensuring continuous software improvement."],
            ["What is the Incremental Model?", "The Incremental Model introduces multiple iterations, where each iteration adds new functionality, allowing early feedback and risk management."],
            ["What are the key strengths of the Incremental Model?", "1. Allows feedback from early iterations 2. Stakeholders are involved throughout development 3. Supports early delivery of software 4. Helps isolate and resolve issues incrementally"],
            ["What is the V-Model?", "The V-Model (Verification & Validation Model) is an SDLC model where each development phase has a corresponding testing phase, ensuring built-in quality assurance."],
            ["Who developed the V-Model, and when?", "The V-Model was developed by NASA in 1991 and first presented at the NCOSE symposium in Chattanooga, Tennessee."],
            ["What are the key benefits of the V-Model?", "1. Testing is built-in at every development stage 2. Helps ensure SMART (Specific, Measurable, Achievable, Realistic, Time-bound) requirements 3. Works well for large projects with multiple stakeholders"],
            ["What is the Spiral Model, and who introduced it?", "The Spiral Model was introduced by Barry Boehm in 1986. It focuses on risk management and uses multiple iterations to gradually refine software."],
            ["What are the four quadrants of the Spiral Model?", "1. Determine objectives 2. Evaluate alternatives & risks 3. Develop and test 4. Plan the next iteration"],
            ["What are the main advantages of the Spiral Model?", "1. Early risk identification and mitigation 2. Iterative refinement of requirements 3. Combines structured & flexible approaches 4. Works well for large, complex projects"],
            ["What is the Wheel-and-Spoke Model?", "The Wheel-and-Spoke Model is based on the Spiral Model but designed for smaller teams that later scale up. It emphasizes iterative development and continuous feedback."],
            ["What is the Unified Process Model (UPM)?", "The Unified Process Model (UPM), also known as the Rational Unified Process (RUP), is an object-oriented SDLC model that focuses on use cases and iterative development."],
            ["What are the four phases of the Unified Process Model?", "1. Inception – Define project goals and scope 2. Elaboration – Develop architecture and high-level design 3. Construction – Implement and test the system 4. Transition – Deploy and maintain the software"],
            ["What is the Rapid Application Development (RAD) Model?", "The RAD Model, introduced by James Martin in 1991, emphasizes fast prototyping and user feedback to speed up development."],
            ["What are some Agile methodologies related to RAD?", "1. Scrum – Uses short development cycles called sprints 2. Extreme Programming (XP) – Developers work in pairs for fast feedback 3. Lean Development – Focuses on delivering minimum viable functionality 4. Joint Application Development (JAD) – Encourages collaboration with users during design"]
        ]
        
    ];

   foreach($questions as $q){
    $stmt-> bind_param("ss",$q[0],$q[1]);
    $stmt->execute();
   }
   echo "seeding success";
}else {
    die("seeding fail".$mysqli->error);
}



?>
