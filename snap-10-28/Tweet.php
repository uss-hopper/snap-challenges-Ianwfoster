<?php

	/**
	 * accessor method for tweet id
	 *
	 *
	 */
	public function getTweetId(\Pdo $pdo, DateTime $tweetDate):
\SplFixedArray{

	$startDateString = $tweetDate->format('Y-m-d') . ' 00:00:00';
	$startDate = new DateTime($startDateString);
	$endDate = new DateTime ($startDateString);
	$endDate->add(new DateInterval('P1D'));
	// create temp
	$query = "SELECT tweetId"
	/**
	 * mutator method for tweet id
	 *
	 * @param RangeException if $newTweetId is not a positive
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

	public static function getTweetByDate (\PDO $pdo, $tweetDate, $statement) : \SplFixedArray {
		$tweetDate = trim($tweetDate);
		$tweetDate = filter_var($tweetDate, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($tweetDate) === true) {
			throw(new InvalidArgumentException("Tweet Date is empty or insecure"));
		}
		// verify the Name will fit in the database
		if(strlen($tweetDate) > 32) {
			throw(new RangeException("Tweet Date is too large"));
		}

		//build an array of tweets
		$tweets = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row =$statement->fetch()) !== false) {
			try {
				$tweet = new Tweet($row["tweetId"], $row["tweetActivationToken"], $row["tweetAvatarUrl"], $row["tweetEmail"],
					$row["tweetHash"], $row["tweetDate"]);
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