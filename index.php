<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUROX Printing Service</title>
</head>
<body style="font-family: Arial; background:#f4f4f4; margin:0; padding:0;">
  <div style="max-width:600px; margin:40px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; color:#333;">STUROX Printing Service</h2>
    <p style="text-align:center;">Upload your documents for printing. Pay via QR below.</p>
    
    <div style="text-align:center; margin:20px 0;">
      <img src="qr.png" alt="Payment QR" style="width:200px;">
    </div>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <label>Name:</label><br>
      <input type="text" name="name" required style="width:100%; margin-bottom:10px;"><br>
      
      <label>Section:</label><br>
      <input type="text" name="section" required style="width:100%; margin-bottom:10px;"><br>
      
      <label>Roll No./ID:</label><br>
      <input type="text" name="rollno" required style="width:100%; margin-bottom:10px;"><br>
      
      <label>Delivery Address:</label><br>
      <textarea name="address" required style="width:100%; margin-bottom:10px;"></textarea><br>
      
      <label>Upload Files:</label><br>
      <input type="file" name="files[]" multiple required style="margin-bottom:10px;"><br>
      
      <input type="submit" value="Submit" style="background:#4CAF50; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">
    </form>
  </div>
</body>
</html>
