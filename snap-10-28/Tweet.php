<?php
namespace Ianwfoster\snapChallenge;
use Ianwfoster\ObjectOriented\Tweet;
use MongoDB\Driver\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use RangeException;

require_once("autoload.php");
require_once(dirname(__DIR__, 1) . "/vendor/autoload.php");

/**
 * id for Tweet: this is the primary key
 * @var Uuid $TweetID
 **/

/**
 * This class is about a tweet
 **/

class Tweet implements \JsonSerializable{
	use ValidateDate;
	use ValidateUuid;
/**id is for Tweet; this is the primay key
 * @var Uuid $tweetId.
 **/
	private $tweetId;
	/**
	 * tweet id that is this Tweet; this is a unique index
	 * @var string $tweetAvatarUrl
	 **/
	private $tweetAvatarUrl;
	/**
	 * token handed out to verify that the Tweet is valid and not malicious.
	 *v@var $tweetActivationToken
	 **/
	private $tweetActivationToken;
	/**
	 * email for this Tweet; this is a unique index
	 * @var string $tweetEmail
	 **/
	private $tweetEmail;
	/**
	 * hash for tweet password
	 * @var $tweetHash
	 **/
	private $tweetHash;
	/**
	 * Name for this Tweet
	 * @var string $tweetUserName
	 **/
	private $tweetUserName;
	private $Date;

	/**
	 * constructor for  this Tweet.
	 *
	 * @param string $newTweetId string containing newTweetId
	 * @param string|null $newTweetAvatarUrl
	 * @param string|null $newTweetActivationToken
	 * @param string $newTweetEmail string containing email
	 * @param string $newTweetHash string containg password hash
	 * @param string $newTweetUserName string containing user name
	 **/
	public function __construct($newTweetId, string $newTweetAvatarUrl, ?string $newTweetActivationToken, string $newTweetEmail, string $newTweetHash, ?string $newTweetUserName) {
		try {
			$this->setTweetId($newTweetId);
			$this->settweetAvatarUrl($newTweetAvatarUrl);
			$this->setTweetActivationToken($newTweetActivationToken);
			$this->setTweetEmail($newTweetEmail);
			$this->setTweetHash($newTweetHash);
			$this->setTweetUserName($newTweetUserName);
		} catch( \InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			//determine what type was thrown
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for tweet id
	 *
	 * @return Uuid value of tweet id (or null if new Tweet)
	 */
	public function getTweetId(): Uuid {
		return ($this->tweetId);
	}
	/**
	 * mutator method for tweet id
	 *
	 * @param Uuid | string $newTweetId
	 * @param RangeException if $newTweetId is not a positive
	 * @throws TypeError if $newTweetId is not a Uuid
	 **/
	public function setTweetId($newTweetId): void {
		try {
			$uuid = self::validateUuid($newTweetId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store this tweet id
		$this->tweetId = $uuid;
	}

	public static function getTweetByUserName (\PDO $pdo, $tweetUserName, $statement) : \SplFixedArray {
		$tweetUserName = trim($tweetUserName);
		$tweetUserName = filter_var($tweetUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($tweetUserName) === true) {
			throw(new InvalidArgumentException("Tweet Name is empty or insecure"));
		}
		// verify the Name will fit in the database
		if(strlen($tweetUserName) > 32) {
			throw(new RangeException("Tweet Name is too large"));
		}

		//build an array of tweets
		$tweets = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row =$statement->fetch()) !== false) {
			try {
				$tweet = new Tweet($row["tweetId"], $row["tweetActivationToken"], $row["tweetAvatarUrl"], $row["tweetEmail"],
					$row["tweetHash"], $row["tweetUserName"]);
				$tweets[$tweets->key()] = $tweet;
				$tweets->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw (new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($tweets);
	}
	/**
	 * Specify data which should be serialized to JSON
	 * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
		// TODO: Implement jsonSerialize() method.
	}


}