import cv2
import pyttsx3
engine=pyttsx3.init()
alg="haarcascade_frontalface_default.xml"
haar_cascade=cv2.CascadeClassifier(alg)
vs=cv2.VideoCapture(0)
while True:
    _,img=vs.read()
    gray=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
    face=haar_cascade.detectMultiScale(gray,1.3,4)
    for (x,y,w,h) in face:
        cv2.rectangle(img,(x,y),(x+w,y+h),(225,0,0),2)
        text="Your face was detected"
        engine.say(text)
        engine.runAndWait()
    cv2.imshow("MY CAM",img)
    key=cv2.waitKey(1) & 0xFF
    if key == ord("q"):
        break
vs.release()
cv2.destroyAllWindows()
