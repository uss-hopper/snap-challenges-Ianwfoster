​
create table  if not exists task(
	taskId binary(20) not null,
	taskDueDate datetime,
	taskDescription varchar(256),
	taskPriority varchar(64) not null,
	taskStartDate datetime,
	taskStatus varchar(64) not null,
	taskTitle varchar(225) not null,
	unique(taskId),
	INDEX(taskTitle),
	primary key(taskId)

)
​

SELECT tweet.tweetContent, profile.profileAtHandle
FROM tweet
INNER JOIN `like` ON tweet.tweetId = like.likeTweetId
INNER JOIN profile ON like.likeProfileId = profile.profileId
WHERE tweet.tweetId = UNHEX('0536faef082b454e9d444cdbe7887d7a');