<?php
require_once __DIR__ . "/../../../database/config.php";

$strand = isset($_GET['strand']) ? trim($_GET['strand']) : '';
$allowed = ['ICT', 'STEM', 'ABM', 'GAS', 'HUMSS'];

if ($strand === '' || !in_array($strand, $allowed, true)) {
    echo '<tr><td colspan="8">Select a valid strand.</td></tr>';
    exit;
}

$stmt = $conn->prepare(
    "SELECT user_id, lastName, firstName, sex, email, contact_num, stdnt_strand, user_systemStatus
     FROM users WHERE stdnt_strand = ?"
);

if (!$stmt) {
    echo '<tr><td colspan="8">Unable to prepare query.</td></tr>';
    exit;
}

$stmt->bind_param('s', $strand);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<tr><td colspan="8">No records found for this strand.</td></tr>';
    $stmt->close();
    exit;
}

while ($row = $result->fetch_assoc()) {
    $userId = htmlspecialchars($row['user_id']);
    $lastName = htmlspecialchars($row['lastName']);
    $firstName = htmlspecialchars($row['firstName']);
    $sex = htmlspecialchars($row['sex']);
    $email = htmlspecialchars($row['email']);
    $contact = htmlspecialchars($row['contact_num']);
    $stdntStrand = htmlspecialchars($row['stdnt_strand']);
    $status = htmlspecialchars($row['user_systemStatus']);
    echo "<tr>";
    echo "<td>{$lastName}</td>";
    echo "<td>{$firstName}</td>";
    echo "<td>{$sex}</td>";
    echo "<td>{$email}</td>";
    echo "<td>{$contact}</td>";
    echo "<td>{$stdntStrand}</td>";
    echo "<td>{$status}</td>";
    echo "<td><button>See Information</button><a href=\"user_edit.php?user_id={$userId}\"><button>Edit</button></a></td>";
    echo "</tr>";
}

$stmt->close();
