#!/bin/bash

cd api
vendor/bin/sail up -d
cd ../ui
npm run dev