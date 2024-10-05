<?php include_once('header.php'); ?>

<h2>Welcome to our website</h2>
<p>
    You can register in this website and create account. 
</p>

<h2 class="mt_20 mb_10">All Registered Users</h2>
<table class="t1">
    <tr>
        <th>SL</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php
    $i = 0;
    $statement = $pdo->prepare("SELECT * FROM users WHERE status=?");
    $statement->execute([1]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php include_once('footer.php'); ?>