<html>
<head>
    <title>Forward Email</title>
</head>
<body>
    <div style="background-color:#E4E4E4;-moz-border-radius:5px;                
                 -webkit-border-radius:5px; width:40%; height:80%">
	<h1 style="width:100%; height:12%; text-align:center;-moz-border-radius:5px;                
                 -webkit-border-radius:5px;"> The Nation </h1>
    <div style="background-color: #F4F4F4;height:78%;margin: 10px 10px;width: 96%;-moz-border-radius:10px;                
                 -webkit-border-radius:10px;">     
        <table style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">
            <tr>
                <td></td>
            </tr>
            <tr>
                <td style="font-size:13px;color:#666;">Name</td>
                <td style="width:80%; height:80%;background-color:#FFF;padding-left:10px;"><?php echo $name; ?></td>
            </tr>
			<tr>
                <td style="font-size:13px;color:#666;">Email</td>
                <td style="width:80%; height:80%;background-color:#FFF;padding-left:10px;"><?php echo $from; ?></td>
            </tr>
			
            <tr>
                <td style="font-size:13px;color:#666;">Subject</td>
                <td style="width:80%; height:80%;background-color:#FFF;padding-left:10px"><?php echo $subject; ?></td>
            </tr>
            <tr>
				<td style="font-size:13px;color:#666;">Address</td>
				<td style="width:80%; height:80%;background-color:#FFF;padding-left:10px;"><?php echo $address; ?></td>
			</tr>
            <tr>
				<td style="font-size:13px;color:#666;">Contact # </td>
				<td style="width:80%; height:80%;background-color:#FFF;padding-left:10px;">
					<? 
						if( isset ($contact_no) && $contact_no!='')
						{ 
							echo $contact_no; 
						}
					?>
				</td>
			</tr>
			<tr>
				<td style="font-size:13px;color:#666;">Message </td>
				<td style="width:80%; height:80%;background-color:#FFF;padding-left:10px;"><?php echo $message; ?></td>
			</tr>
			
		</table>
    </div>
</div> 
</body>
</html>