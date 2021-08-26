## Usage

 - run `docker build -t skaut/it-jobs .` for container build
 - run `docker run --volume $(pwd):/app skaut/it-jobs php build.php`
for build from `input/listings.json` into HTML + CSS in `output`
 - use in cron, or via git hook when data change
