<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
}

.container {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 200px;
    background-color: #333;
    color: white;
    padding: 15px;
}

.sidebar h2 {
    margin-top: 0;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar li {
    margin-bottom: 15px;
}

.sidebar a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.sidebar a:hover {
    text-decoration: underline;
}

/* Main content styles */
.main-content {
    flex-grow: 1;
    padding: 20px;
}

h1 {
    margin-top: 0;
}

p {
    line-height: 1.6;
}

    </style>
</head>