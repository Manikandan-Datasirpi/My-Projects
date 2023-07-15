import cv2
import imutils
import os
datasets='Datasets'
sub_data='Modi'
path=os.path.join(datasets,sub_data)
if not os.path.isdir(path):
    os.mkdir(path)
(width,height)=(130,100)
alg="haarcascade_frontalface_default.xml"
harr_cascade=cv2.CascadeClassifier(alg)
(width,height)=(130,100)
vs=cv2.VideoCapture(0)
count=1
while count<31:
    print(count)
    _,img=vs.read()
    gray=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
    gray=cv2.dilate(gray,None,iterations=2)
    gray=cv2.erode(gray,None,iterations=2)
    face=harr_cascade.detectMultiScale(gray,1.5,4)
    for (x,y,w,h) in face:
        cv2.rectangle(img,(x,y),(x+w,y+h),(255,0,0),2)
        face=gray[y:y+h,x:x+w]
        face_resize=cv2.resize(face,(width,height))
        cv2.imwrite("%s/%s.png"%(path,count),face_resize)
        count+=1
    cv2.imshow("FACE DETECTION",img)
    key=cv2.waitKey(1) & 0xFF
    if key == ord("q"):
        break
vs.release()
cv2.destroyAllWindows()
