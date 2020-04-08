#!/bin/sh

. ./.env

aws configure set aws_access_key_id $AWS_ACCESS_KEY_ID
aws configure set aws_secret_access_key $AWS_SECRET_ACCESS_KEY
aws configure set region $AWS_DEFAULT_REGION
aws configure set output text

BACKUP_TO_DOWNLOAD=$(echo `aws s3 ls $S3_BUCKET_URL | sort | tail -1 | rev | cut -d' ' -f1 | rev`)
echo "\nThe last backup file is: $BACKUP_TO_DOWNLOAD"

BACKUP_URL="$S3_BUCKET_URL$BACKUP_TO_DOWNLOAD"
echo "The backup URL is: $BACKUP_URL\n"

echo "Downloading the backup file..."
aws s3 cp "$BACKUP_URL" /tmp

echo "\nReplacing the current data directory..."
rm -rf ./data
tar xzfv /tmp/$BACKUP_TO_DOWNLOAD
