<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Data Design</title>
		<link type="text/css" rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<h1>Reddit Data Design</h1>
		<h2>User Persona:</h2>
		<p>Users who enjoy using this site enjoy to have a platform where they can
			<br>
			subcribe to accounts that post a specific theme or topic on their page. They
			<br>
			also get to express thier liking or disliking of the post with an up or down vote.
			<br>
			They get to share, and create posts of their own, making this site one very much
			<br>
			loved by people who love to voice thier opinion
		</p>
<h2>User Story</h2>
		<p>"I want to check my city's local reddit page"</p>
		<h3>Use Case/Interaction Flow</h3>
		<ul>
			<li>I click log in and enter my username and password</li>
			<li>The site logs me in</li>
			<li>I click on the "search" bar</li>
			<li>The site allows me to type in what i am looking for</li>
			<li>I type in "Albuquerque"</li>
			<li>The site shows me posts and accounts related to Albuquerque</li>
			<li>I click on the account that says Albuquerque</li>
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
		<h3>comment</h3>
		<ul>
			<li>commentId(primary key)</li>
			<li>commentProfileId(foreign key)</li>
			<li>commentContent</li>
			<li>commentDate</li>
		</ul>
		<h3>Up-vote</h3>
		<ul>
			<li>upvoteProfileId(foreign key)</li>
			<li>upvoteCommentId(foreign key)</li>
			<li>upvoteDate</li>
		</ul>
		<h3>Down-vote</h3>
		<ul>
			<li>downvoteProfileId(foreign key)</li>
			<li>downvoteCommentId(foreign key)</li>
			<li>downvoteDate</li>
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