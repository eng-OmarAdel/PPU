# PPU
## Table of contents
#### [Overview](https://github.com/eng-OmarAdel/PPU/blob/master/README.md#overview)
#### [Getting started](https://github.com/eng-OmarAdel/PPU/blob/master/README.md#getting-started)
#### [Constraints](https://github.com/eng-OmarAdel/PPU/blob/master/README.md#constraints)
#### [How it works](https://github.com/eng-OmarAdel/PPU/blob/master/README.md#how-it-works)
#### [Old repo](https://github.com/OmarAliAbdelNaby/ImageProcessing)
#### [Online website](http://pputest.tk/)
Note: Currently there's a problem with the server we are hosting on (Its python is not working for some reason) we are working on the issue but rest assured our app will work perfectly fine on your localhost or any other host.
## Overview
PPU is a simple and user-friendly web app that allows citizens to take a photo of their electric ,
gas or water meter and detects the reading of the meter, and shows it to the user.
## Getting started
1. You need to install xampp (or any local webhosting software), PHP 7.0 or higher, Python 3.7.X or higher and all the used packages and cURL.
2. Download the repo or clone it.
3. Connect your mobile to the same network with your local host.
4. Open Firefox then type in the address bar the IP of your local host (usually 192.168.1.x)
5. Choose the utility meter you want to read.
6. Take a photo of it.
7. See your reading :D .
## Constraints:
- While scanning your meter please make sure that light intensity is good.
- Make sure there&#39;s no light reflections from the meter.
- Try to put the reading exactly in the black rectangle.
- The digits should be vertical inside the rectangle.
- Wait a second for the auto-focus to take effect.
## How it works
### Flow
First index.php is loaded (it checks if the GET message contains usage variable if so it displays it).
After choosing your desired meter, cam.html is loaded. When you take your photo we use AJAX to send it to server.php.
server.php then checks which meter you want to read then it executes the corresponding python script and gets the reading from it. To communicate with the OCR API we use cURL. Then it checks whether the reading is normal or an outlier and sends this information back to the AJAX post. cam.html then redirects you back to index.php with usage variable carrying the message to be displayed with your reading and its status.
### X meter
### Y meter
