<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>ERD Snap-10-11</title>

</head>

<body>

<h1>User</h1>
<ul>
	<li>userId (PK)</li>
	<li>userName</li>
	<li>userHash</li>
</ul>
<h1>Shipping</h1>
<ul>
	<li>shippingAddressId(PK)</li>
	<li>shippingAddressStreet</li>
	<li>shippingAddressCity</li>
	<li>shippingAddressState</li>
	<li>shippingAddressZip</li>
	<li>shippingAddressUserId(FK)</li>
</ul>
</body>
</html>