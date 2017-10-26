<?php
/**
 * Comments entity for reddit
 *
 * This is the comments entity that stores comments of Profiles.
 *
 * @author Chris Owens <cowens17@cnm.edu>
 * @version 7.1
 **/
namespace Edu\Cnm\DataDesign;
require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");
use Ramsey\Uuid\Uuid;
class Comments implements \JsonSerializable {
	use ValidateUuid;
	use ValidateDate;
	/**
	 * id for this comments; this is the primary key
	 * @var Uuid $commentsId
	 **/
	private $commentsId;
	/**
	 * id for the profile this comments is assigned to; this is a foreign key
	 * @var Uuid $commentsProfileId
	 **/
	private $commentsProfileId;
	/**
	 * id for the post this comments is on; this is a foreign key
	 * @var Uuid $commentsPostId
	 **/
	private $commentsPostId;
	/**
	 * id for the comments this comments is on; this is a recursive foreign key
	 * @var Uuid $commentsCommentsId
	 **/
	private $commentsCommentsId;
	/**
	 * this is the content of the comments
	 * @var string $commentsContent
	 **/
	private $commentsContent;
	/**
	 * this is the date comments was created
	 * @var \DateTime $commentsDate
	 **/
	private $commentsDate;

	/**
	 * constructor for this Comments
	 *
	 * @param Uuid $newCommentsId id of this comments or null if a new comments
	 * @param Uuid $newCommentsProfileId id of the Profile that wrote this comments
	 * @param Uuid $newCommentsPostId id of the Post this comments is on
	 * @param Uuid $newCommentsCommentsId id of the comments this comments is on
	 * @param string $newCommentsContent string containing actual comments data
	 * @param \DateTime|string|null $newCommentsDate date and time comments was made or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newCommentsId, $newCommentsProfileId, $newCommentsPostId, $newCommentsCommentsId, string $newCommentsContent, $newCommentsDate = null) {
		try {
			$this->setCommentsId($newCommentsId);
			$this->setCommentsProfileId($newCommentsProfileId);
			$this->setCommentsPostId($newCommentsPostId);
			$this->setCommentsCommentsId($newCommentsCommentsId);
			$this->setCommentsContent($newCommentsContent);
			$this->setCommentsDate($newCommentsDate);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
/**
 * accessor method for comments id
 *
 * @return Uuid value of comments id
 **/
public function getCommentsId(): Uuid {
	return $this->commentsId;
}
/**
 * mutator method for comments id
 *
 * @param Uuid $newCommentsId new value of comments id
 * @throws \UnexpectedValueException if $newCommentsId is not a UUID
 **/
public function setCommentsId($newCommentsId) : void {
	try {
		$uuid = self::validateUuid($newCommentsId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
	//convert and store the comments id
	$this->commentsId = $uuid;
}
