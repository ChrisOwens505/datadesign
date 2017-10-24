<?php
/**
 * Profile entity for reddit
 *
 * This entity stores profiles of users
 *
 * @author Chris Owens <cowens17@cnm.edu>
 * Version 7.1
 **/
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Profile implements \JsonSerializable {
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

	public function __construct($newProfileId, string $newProfileUserName, ?string $newProfileActivationToken, string $newProfileEmail, string $newProfileHash, string $newProfileSalt) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileUserName($newProfileUserName);
			$this->setProfileActivationToken($newProfileActivationToken);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfileSalt($newProfileSalt);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			//determine what exception type was thrown
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profile id
	 * @return uuid value of profile id (or null if new Profile)
	 **/
	public function getProfileId(): Uuid {
		return ($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param Uuid|null $newProfileId value of new profile id
	 * @throws \TypeError if $newProfileId is not a Uuid
	 **/
	public function setProfileId($newProfileId): void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the post
		$this->ProfileId = $uuid;
	}
/**
 * accessor method for user name
 *
 * @return string value of user name
 **/
	public function getProfileUserName(): string {
		return ($this->profileUserName);
}
/**
 * mutator method for user name
 *
 * @param string $newProfileUserName new value of user name
 * @throws \InvalidArgumentException if $newProfileUserName is not a string or insecure
 * @throws \RangeException if $newProfileUserName is > 128 characters
 * @throws \TypeError if $newProfileUserName is not a string
 **/
	public function setProfileUserName(string $newProfileUserName) : void {
	// verify the user name is secure
	$newProfileUserName = trim($newProfileUserName);
	$newProfileUserName = filter_var($newProfileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newProfileUserName) === true) {
		throw(new \InvalidArgumentException("profile user name is empty or insecure"));
	}
	// verify the user name will fit in the database
	if(strlen($newProfileUserName) > 128) {
		throw(new \RangeException("profile user name is too large"));
	}
	// store the user name
	$this->profileUserName = $newProfileUserName;
	}
/**
 * accessor method for account activation token
 *
 * @return string value of the activation token
 **/
public function getProfileActivationToken() : ?string {
	return ($this->profileActivationToken);
}
/**
 * mutator method for account activation token
 *
 * @param string $newProfileActivationToken
 * @throws \InvalidArgumentException  if the token is not a string or insecure
 * @throws \RangeException if the token is not exactly 32 characters
 * @throws \TypeError if the activation token is not a string
 **/
public function setProfileActivationToken(?string $newProfileActivationToken): void {
	if($newProfileActivationToken === null) {
		$this->profileActivationToken = null;
		return;
	}
	$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
	if(ctype_xdigit($newProfileActivationToken) === false) {
		throw(new\RangeException("user activation is not valid"));
	}
	//make sure user activation token is only 32 characters
	if(strlen($newProfileActivationToken) !== 32) {
		throw(new\RangeException("user activation token has to be 32"));
	}
	$this->profileActivationToken = $newProfileActivationToken;
}

	/**
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
	}
}