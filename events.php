<?php
// Connect to the database
require 'config.php';

// Fetch events from the database
$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Davan Ticketing System</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>

    <header>
        <h1>Available Events</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <section class="events">
        <h2>Upcoming Events</h2>
        <div class="event-list">
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="event">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><strong>Date:</strong> <?php echo date("F j, Y", strtotime($row['event_date'])); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <a href="booking.php?event_id=<?php echo $row['id']; ?>" class="btn">Book Now</a>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p>No upcoming events at the moment.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <p>&copy; Davan Event Ticketing System. All rights reserved.</p>
    </footer>

</body>

</html>