#download POST as json

use: /index.php?d=[{"foo":"bar", "answer":42}]
get: [{"foo":"bar", "answer":42}] as content.json
