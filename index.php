<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Data Design</title>
	</head>
	<body>
		<h1>Reddit Data Design</h1>
		<h2>User Persona:</h2>
		<ul>
			<li>Name: Jim Bean</li>
			<li>Age: 22</li>
			<li>Occupation: Janitor</li>
		</ul>
		<p>Jim enjoys using this site because he have a platform where I can
			subcribe to accounts that post themes or topics that I like on their page. I
			also get to express my liking or disliking of the post with an up or down vote.
			I get to share, and create posts of my own, which i really like since i love to
			tell everyone what im thinking, whether they want me to or not.
		</p>
<h2>User Story</h2>
		<p>"I want to check my city's local reddit page"</p>
		<h3>Use Case/Interaction Flow</h3>
		<ul>
			<li>He clicks log in and enter my username and password</li>
			<li>The site logs me in</li>
			<li>He clicks on the "search" bar</li>
			<li>The site allows me to type in what i am looking for</li>
			<li>He types in "Albuquerque"</li>
			<li>The site shows me posts and accounts related to Albuquerque</li>
			<li>He clicks on the account that says Albuquerque</li>
			<li>The site displays the accounts posts for my enjoyment</li>
		</ul>
		<h2>Conceptual Model</h2>
		<h3>Profile</h3>
		<ul>
			<li>profileId(primary key)</li>
			<li>profileEmail</li>
			<li>profileHash</li>
			<li>profilePhone</li>
			<li>profileSalt</li>
		</ul>
		<h3>Post</h3>
		<ul>
			<li>postid</li>
			<li>postprofileid</li>
			<li>postcontent</li>
			<li>postdate</li>
		</ul>
		<h3>comment</h3>
		<ul>
			<li>commentId(primary key)</li>
			<li>commentProfileId(foreign key)</li>
			<li>commentContent</li>
			<li>commentDate</li>
		</ul>
		<h3>Up-vote</h3>
		<ul>
			<li>voteProfileId(foreign key)</li>
			<li>voteCommentId(foreign key)</li>
			<li>voteDate</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One Profile can write many Comments (1 to n)</li>
			<li>Many Profiles can Up-Vote many Comments</li>
			<li>Many Profiles can Down-Vote many Comments</li>
			<li>Many Comments can have many Up-Votes</li>
			<li>Many Comments can have many Down-Votes</li>
		</ul>
	</body>
</html>