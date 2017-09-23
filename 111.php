<?php
use Streamer\Stream,
    Streamer\FileStream,
    Streamer\NetworkStream;

// basic usage
$stream = new Stream(fopen('smiley.png', 'r'));
$image = '';
while (!$stream->isEOF()) {
  $image .= $stream->read();
}

// pipe dreams!
$stream1 = new Stream(fopen('smiley.png', 'r'));
$stream2 = new Stream(fopen('tmp.png', 'w'));
// copy the contents from the first stream to the second one
$stream1->pipe($stream2);

// factory
$fileStream = FileStream::create('smiley.png', 'r');
print_r($fileStream);

$networkStream = NetworkStream::create('tcp://www.google.com:80');
print_r($networkStream);  ?>