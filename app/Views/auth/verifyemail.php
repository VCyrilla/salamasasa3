<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <?php if(isset($token)): ?>
        <p>Your verification token is: <strong><?php echo $token; ?></strong></p>
    <?php else: ?>
        <p>No token provided.</p>
    <?php endif; ?>
</body>
</html>
