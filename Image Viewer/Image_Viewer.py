#Image Viewer

#import Tkinter 
from tkinter import *

#import Pillow for using Image 
from PIL import ImageTk,Image

#init
op=Tk()
#Icon
op.iconbitmap("image_viewer.ico")

#Title
op.title("Image Viewer")

#global declaration
global images,Label1
i=0

#Define movement 
def backward():
    global i
    if i>0 and i<=(n-1):#we use n no.of images so i<=n
        i=i-1
        Label1=Label(image=images[i])
        Label1.grid(row=0,column=0,columnspan=3)
        status=Label(op,text="Image "+str((i+1))+" of "+str(n),bd=1,relief=SUNKEN,anchor=E)
        status.grid(row=2,column=0,columnspan=3,sticky=W+E)
        if i==0:
            Button1=Button(op,text="<<",state=DISABLED)
            Button1.grid(row=1,column=0)
        if i>0 and i<(n-1):
            Button3=Button(op,text=">>",command=forward)
            Button3.grid(row=1,column=2)

def forward():
    global i
    if i<(n-1):#we use n no.of images so i<n
        i=i+1
        Label1=Label(image=images[i])
        Label1.grid(row=0,column=0,columnspan=3)
        status=Label(op,text="Image "+str((i+1))+" of "+str(n),bd=1,relief=SUNKEN,anchor=E)
        status.grid(row=2,column=0,columnspan=3,sticky=W+E)
        if i==(n-1):
            Button3=Button(op,text=">>",state=DISABLED)
            Button3.grid(row=1,column=2)
        if i>0:
            Button1=Button(op,text="<<",command=backward)
            Button1.grid(row=1,column=0)
def close():
    op.destroy()
#Image initlization
img1=ImageTk.PhotoImage(Image.open("sample.jpeg"))
img2=ImageTk.PhotoImage(Image.open("sample1.png"))
img3=ImageTk.PhotoImage(Image.open("sample2.jpeg"))
img4=ImageTk.PhotoImage(Image.open("sample3.png"))
images=[img1,img2,img3,img4]
global n
n=len(images)
print("Number of images in your Directory:",n)

#Label the default Image
Label1=Label(image=img1)
Label1.grid(row=0,column=0,columnspan=3)

#Define Button
global Button1,Button3,status
Button1=Button(op,text="<<",command=backward)
Button2=Button(op,text="Exit",font=("Calibri",14,"bold"),command=close)
Button3=Button(op,text=">>",command=forward)
status=Label(op,text="Image "+str((i+1))+" of "+str(n),bd=1,relief=SUNKEN,anchor=E)
    
Button1.grid(row=1,column=0,pady=10)
Button2.grid(row=1,column=1,pady=10)
Button3.grid(row=1,column=2,pady=10)
status.grid(row=2,column=0,columnspan=3,sticky=W+E)
op.mainloop()
