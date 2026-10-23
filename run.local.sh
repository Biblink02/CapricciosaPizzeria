#!/bin/sh
set -eu
cd "$(dirname "$0")"
exec docker compose -f docker-compose.local.yml up --build "$@"
