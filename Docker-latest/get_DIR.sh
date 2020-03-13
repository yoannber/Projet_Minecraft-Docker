#!/bin/bash

SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")
echo $SCRIPTPATH | grep -oP "([^/]+$)" | tr [A-Z] [a-z]
