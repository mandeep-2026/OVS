<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
    exit();
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($userdata['status'] == 0) {
    $status = '<b style="color:red">Not Voted</b>';
} else {
    $status = '<b style="color:green">Voted</b>';
}
?>

<html>
<head>
    <title>OVS SYSTEM</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #ecf0f1; /* Light background */
            margin: 0;
            font-family: Arial, sans-serif;
            color: #2c3e50; /* Dark text */
        }

        /* Menu Bar Styling */
        .navbar {
            display: flex;
            align-items: center;
            background-color: #2c3e50; /* Dark Blue-Grey */
            padding: 10px 20px;
        }
        .navbar h1 {
            margin: 0;
            font-size: 22px;
            color: white;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .menu-center {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        .menu-right {
            display: flex;
            justify-content: flex-end;
        }
        .menu-center a, .menu-right a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .menu-center a:hover, .menu-right a:hover {
            color: #18bc9c; /* Emerald hover */
        }

        #Profile {
            background-color: white;
            width: 30%;
            padding: 20px;
            margin: 5%;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        #Group {
            background-color: white;
            width: 60%;
            padding: 20px;
            margin-left: 5%;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        #votebtn {
            padding: 5px 10px;
            font-size: 15px;
            background-color: #18bc9c;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        #votebtn:hover {
            background-color: #16a085;
        }
             .vote-heading i {
            color: #18bc9c;
            margin-right: 8px;
             padding: 30px;
             font-weight:bold;
        }

         #gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 20px 0;
        }
        .a {
            height: 200px;
            width: 300px;
            background: #f5f5f5;
            margin: 10px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 0px 15px grey;
            text-align: center;
            font-size: 18px;
        }
        
        .a img {
            height: 200px;
            width: 300px;
            object-fit: cover;
        }
        
        .a img:hover {
            transform: scale(1.1);
            transition: transform 0.3s;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            font-size: 14px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<!-- Menu Bar -->
<div class="navbar">
    <h1><i class="fas fa-vote-yea"></i> Online Voting System</h1>
    <div class="menu-center">
        <a href="home.html"><i class="fas fa-home"></i> Home</a>
        <a href="rules.html"><i class="fas fa-gavel"></i> Rules</a>
        <a href="help.html"><i class="fas fa-question-circle"></i> Help</a>
        <a href="../login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>
    <div class="menu-right">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div id="mainSection">
    <p style="text-align:center; font-size:16px;font-weight:bold;">
        Welcome to your secure voting dashboard. Cast your vote with confidence!
    </p>
    <div id="gallery">
        <div class="a">
            <img src="../Images/booth.png" alt="Voting Booth">
            <p style="color:black;">Voting Booth</p>
        </div>
        <div class="a">
            <img src="../Images/one-voter-sure.png" alt="Campaign">
            <p style="color:black;">Campaign</p>
        </div>
        <div class="a">
            <img src="../Images/counts.jpeg" alt="Counting">
            <p style="color:black;">Vote Counting</p>
        </div>
        <div class="a">
            <img src="../Images/cele.png" alt="Celebration">
            <p style="color:black;">Celebration</p>
        </div>
    </div>
    <p style="text-align:left; font-size:16px;padding:15px;">An Online Voting System (OVS) is a secure, web-based application that enables eligible voters to cast their votes electronically through the internet instead of using traditional paper ballots. It is designed to make the voting process more convenient, faster, and transparent by allowing voters to participate from any location without the need to physically visit a polling station. </p>
    <p style="text-align:left; font-size:16px;padding:15px;">Online voting systems offer several advantages such as time efficiency, cost reduction, and accessibility, making them useful for government elections, academic institutions, corporate decision-making, and opinion polls. However, challenges like cybersecurity threats, technical failures, and limited internet access in some areas must be addressed to ensure fairness and reliability. Overall, the online voting system represents a modern, technology-driven approach to elections, combining ease of use with the potential for greater voter participation.</p>
    <hr>

    <!-- Profile Section -->
    <p style="text-align:center; font-size:15px; font-weight:bold;">
        Below is your personal profile information. Please ensure your details are correct before voting.
    </p>
    <center>
        <div id="Profile">
            <center>
                <img src="../uploads/<?php echo $userdata['photo']; ?>" height="100" width="100">
            </center><br><br>
            <b>Name: </b><?php echo $userdata['email']; ?><br><br>
            <b>Address: </b><?php echo $userdata['address']; ?><br><br>
            <b>Status: </b><?php echo $status; ?><br><br>
            <p style="font-size:14px;">
                This is your personal profile section. Here you can review your details
                and see your voting status in the current election.
            </p>
        </div>
    </center>
   
    <!-- Group Section -->
    <p style="text-align:center; font-size:15px; margin-top:20px;">
        Choose a group below to support in this election. Once you vote, your choice is final.
    </p>
    <p style="text-align:left; font-size:16px;padding:15px;">To vote in an online voting system, a registered voter must first log in to the voting portal using their provided credentials, such as a username, password, or one-time password (OTP) for authentication. Once logged in, the voter will see a digital ballot displaying the list of candidates or options. The voter then selects their preferred choice and carefully reviews it before confirming the submission. After confirmation, the system securely encrypts the vote and stores it in the database, ensuring it cannot be altered or duplicated. Finally, the system displays a message indicating that the vote has been successfully recorded, and the voter can log out, confident that their vote is counted toward the final results.</p>
    <div class="vote-heading">
        <i class="fas fa-hand-point-down"></i> Here to Vote
    </div>
    <div id="Group">
        <p style="font-size:15px; font-weight:bold;">
            Available Groups to Vote:
        </p>
        <?php 
        if (!empty($groupsdata)) {
            for ($i = 0; $i < count($groupsdata); $i++) { ?>
                <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']; ?>" height="100" width="100" alt="">
                    <b>Group Name: </b><?php echo $groupsdata[$i]['email']; ?><br><br>
                    <b>Votes: </b><?php echo $groupsdata[$i]['votes']; ?><br><br>
                    <p style="font-size:13px; color:#444;">
                        Support your favorite group by clicking the vote button below.
                        Every vote matters!
                    </p>
                    <form action="../api/vote.php" method="post">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']; ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']; ?>">
                        <?php if ($userdata['status'] == 0) { ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                        <?php } else { ?>
                            <b style="color:green">You have already voted</b>
                        <?php } ?>
                    </form>
                </div>
                <hr>
        <?php 
            }
        } else {
            echo "<b>No groups available</b>";
        }
        ?>
    </div>

    <!-- Add Winner Button After Group Section -->
<?php if ($userdata['status'] == 1) { ?>
    <div style="text-align:center; margin:20px;">
        <a href="../winner.php" style="text-decoration:none; background:#28a745; color:white; padding:10px 20px; border-radius:5px; font-weight:bold;">
            <i class="fas fa-trophy"></i> View Winner
        </a>
    </div>
<?php } ?>


    <p style="text-align:left; font-size:16px;padding:15px;">The Online Voting System is a modern, technology-driven method of conducting elections that allows voters to cast their votes securely over the internet from any location. It streamlines the entire process—from voter authentication and ballot display to vote submission, encryption, and result generation—making it faster, more efficient, and highly accessible. By eliminating the need for physical polling stations and manual counting, it reduces costs, saves time, and minimizes human error. However, to maintain trust and transparency, strong security measures must be implemented to protect against hacking, fraud, and technical failures. Overall, the online voting system represents a significant step toward digital democracy, offering convenience and accuracy while encouraging greater voter participation.</p>

    <p style="text-align:center; font-size:14px; margin-top:15px;">
        Thank you for participating in the election. Your decision shapes the future!
    </p>
</div>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> Online Voting System | Developed by Mandeep Chaurasia |
    <span style="font-size:12px;">Your vote is your voice — make it count!</span>
</footer>

</body>
</html>
