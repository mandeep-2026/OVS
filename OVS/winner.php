<?php
session_start();
include("api/connect.php");


// Get the candidate with the most votes
$winnerQuery = mysqli_query($connect, "SELECT * FROM user WHERE role=2 ORDER BY votes DESC LIMIT 1");
$winner = mysqli_fetch_assoc($winnerQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Election Winner - OVS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#008080;
            text-align: center;
            padding: 30px;
            color: #2c3e50;
            overflow-x: hidden;
        }
        .winner-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            animation: popIn 1s ease-out;
            margin-top: 20px;
        }
        .winner-card img {
            border-radius: 50%;
            border: 5px solid gold;
            margin-bottom: 15px;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: gold;
            color: #2c3e50;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .back-btn:hover {
            background-color: #d4ac0d;
            color: white;
        }
        h1 {
            color: #f39c12;
            animation: glow 1.5s infinite alternate;
        }
        @keyframes glow {
            from { text-shadow: 0 0 10px gold, 0 0 20px orange; }
            to { text-shadow: 0 0 20px gold, 0 0 40px orange; }
        }
        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        /* Floating Confetti */
        .confetti {
            position: fixed;
            top: -10px;
            width: 10px;
            height: 10px;
            background: gold;
            animation: fall 5s linear infinite;
        }
        @keyframes fall {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }
    </style>
</head>
<body>

<h1><i class="fas fa-trophy"></i> Election Winner</h1>

<?php if ($winner) { ?>
    <div class="winner-card">
        <img src="uploads/<?php echo htmlspecialchars($winner['photo']); ?>" width="150" height="150">
        <h2><?php echo htmlspecialchars($winner['email']); ?></h2>
        <p><strong>Total Votes:</strong> <?php echo $winner['votes']; ?></p>
        <h3 style="color:green;">Congratulations!</h3>
    </div>
<?php } else { ?>
    <p>No winner found. Voting might still be ongoing.</p>
<?php } ?>

<br>
<a href="Routes/Dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>

<!-- Confetti Effect -->
<?php for ($i=0; $i<30; $i++): ?>
    <div class="confetti" style="
        left: <?php echo rand(0,100); ?>%;
        background: <?php echo (rand(0,1) ? 'gold' : 'orange'); ?>;
        animation-delay: <?php echo rand(0,5); ?>s;
    "></div>
<?php endfor; ?>

</body>
</html>
