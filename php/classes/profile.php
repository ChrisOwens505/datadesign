<?php
/**
 * Profile entity for reddit
 *
 * This entity stores profiles of users
 *
 * @author Chris Owens
 * Version 7.1
 **/
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Profile implements \abstract {;
	use ValidateUuid;
	use ValidateDate;
	/**
	 * id for this profile; this is the primary key
	 * @var Uuid $profileId
	 **/
	private $profileId;
	/**
	 * token handed out to verify that the profile is valid and not malicious
	 * @var $profileActivationToken
	 **/
	private $profileActivationToken;
	/**
	 * User name of this profile; this is a unique index
	 * @var string $profileUserName
	 **/
	private $profileUserName;
	/**
	 * email for this Profile; this is a unique index
	 * @var string $profileEmail
	 **/
	private $profileEmail;
	/**
	 * hash for profile password
	 * @var $profileHash
	 **/
	private $profileHash;
	/**
	 * salt for profile password
	 * @var $profileSalt
	 **/
	private $profileSalt;
	/**
	 * constructor for this Profile
	 *
	 * @param uuid $newProfileId id of this Profile or null if a new Profile
	 * @param string $newProfileUserName string containing newAtHandle
	 * @param string $newProfileActivationToken activation token to safe guard against malicious accounts
	 * @param string $newProfileEmail string containing email
	 * @param string $newProfileHash string containing password hash
	 * @param string $newProfileSalt string containing passowrd salt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/