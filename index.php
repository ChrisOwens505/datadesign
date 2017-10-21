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
			<li>Age:25</li>
			<li>Location: Albuquerque, New Mexico</li>
			<li>Hobbies: long walks on the beach, expressing political views</li>
			<li>Frustrations:to many buttons, complicated vocabulary, slow and bored User Experiences</li>
			<li>Occupation: Janitor at a local high school</li>
		</ul>
		<p>Jim enjoys using this site because He has a platform where He can
			follow accounts that post themes or topics that He likes. he also gets
			to express His liking or disliking of the post with an up or down vote.
			He gets to share, and create posts of His own, which He really likes since He loves to
			tell everyone what He's thinking, whether they want Him to or not. He enjoys to post
			things that make other people, happy, sad, or really pissed off. He loves to find forums
			that are based off topics he does not agree with, and fight with the users who do agree
			with the forum.
		</p>
<h2>User Story</h2>
		<p>"I want to check Albuquerque's local news on Reddit "</p>
		<h3>Use Case/Interaction Flow</h3>
		<ul>
			<li>He opens his web browser</li>
			<li>The computer displays browser homepage</li>
         <li>He types "Reddit.com" in the search bar</li>
			<li>The browser displays the Reddit home page</li>
			<li>He clicks log in </li>
			<li>The site displays the log in window</li>
			<li>He enters his email and password</li>
			<li>The site logs him in</li>
			<li>He clicks on the "search" bar</li>
			<li>The site lets him type in the search bar</li>
			<li>He types in "Albuquerque"</li>
			<li>The site shows him posts and accounts related to Albuquerque</li>
			<li>He clicks on the account that says Albuquerque News</li>
			<li>The site displays the accounts posts and comments</li>
			<li>He browses the accounts page and gives his opinion on posts he likes/dislikes</li>
		</ul>
		<h2>Conceptual Model</h2>
		<h3>Profile</h3>
		<ul>
			<li>profileId(primary key)</li>
			<li>profileActivationToken</li>
			<li>profileHandle</li>
			<li>profileEmail</li>
			<li>profileHash</li>
			<li>profilePhone</li>
			<li>profileSalt</li>
		</ul>
		<h3>Post</h3>
		<ul>
			<li>postId(primary key)</li>
			<li>postProfileId(foreign key)</li>
			<li>postContent</li>
			<li>postDate</li>
		</ul>
		<h3>Comment</h3>
		<ul>
			<li>commentId(primary key)</li>
			<li>commentProfileId(foreign key)</li>
			<li>commentContent</li>
			<li>commentDate</li>
		</ul>
		<h3>Vote</h3>
		<ul>
			<li>voteProfileId(foreign key)</li>
			<li>voteCommentId(foreign key)</li>
			<li>voteDate</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One Profile can post many Posts (1 to n)</li>
			<li>One Profile can write many Comments (1 to n)</li>
			<li>One Profile can Vote on many Posts (1 to n)</li>
			<li>Many Profiles can Vote on many Comments (m to n)</li>
			<li>One Comments can have many Votes (1 to n)</li>
		</ul>
	</body>
</html>