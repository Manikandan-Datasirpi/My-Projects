from tkinter import *
op=Tk()
op.title("Calculater")
op.iconbitmap("icon2.ico")
Input=Entry(op,width=30,borderwidth=2)
Input.grid(row=0,column=0,columnspan=4)
Label1=Label(op, text="      ").grid(row=1,column=0,columnspan=3)
def value(n):
    current=Input.get()
    Input.delete(0,END)
    Input.insert(0,current+n)
    total=current+n
    global result
    result=total
def equal():
    try:
        c=eval(result)
    except:
        Input.delete(0,END)
        c="Syntax Error"
        Input.insert(0,c)
    Input.delete(0,END)
    Input.insert(0,c)
def clear():
    Input.delete(0,END)
#Define Button
Button1=Button(text="7",padx=20,pady=10,fg="green",command=lambda: value("7"))
Button2=Button(text="8",padx=20,pady=10,fg="green",command=lambda: value("8"))
Button3=Button(text="9",padx=20,pady=10,fg="green",command=lambda: value("9"))
Button_add=Button(text="+",padx=20,pady=10,fg="green",command=lambda: value("+"))
 
Button4=Button(text="6",padx=20,pady=10,fg="green",command=lambda: value("6"))
Button5=Button(text="5",padx=20,pady=10,fg="green",command=lambda: value("5"))
Button6=Button(text="4",padx=20,pady=10,fg="green",command=lambda: value("4"))
Button_sub=Button(text="-",padx=20,pady=10,fg="green",command=lambda: value("-"))
                
Button7=Button(text="3",padx=20,pady=10,fg="green",command=lambda: value("3"))
Button8=Button(text="2",padx=20,pady=10,fg="green",command=lambda: value("2"))
Button9=Button(text="1",padx=20,pady=10,fg="green",command=lambda: value("1"))
Button_multi=Button(text="*",padx=20,pady=10,fg="green",command=lambda: value("*"))

Button0=Button(text="0",padx=20,pady=10,fg="green",command=lambda: value("0"))
Button_div=Button(text="/",padx=20,pady=10,fg="green",command=lambda: value("/"))
Button_mod=Button(text="%",padx=20,pady=10,fg="green",command=lambda: value("%"))
Button_equal=Button(text="=",padx=20,pady=10,fg="green",command=equal)
Button_clear=Button(text="Clear",padx=95,pady=10,fg="green",command=clear)
                    
#Postion the button
Button1.grid(row=2,column=0)
Button2.grid(row=2,column=1)
Button3.grid(row=2,column=2)
Button_add.grid(row=2,column=3)
                    
Button4.grid(row=3,column=0)
Button5.grid(row=3,column=1)
Button6.grid(row=3,column=2)
Button_sub.grid(row=3,column=3)

Button7.grid(row=4,column=0)
Button8.grid(row=4,column=1)
Button9.grid(row=4,column=2)
Button_multi.grid(row=4,column=3)

Button0.grid(row=5,column=0)
Button_div.grid(row=5,column=1)
Button_mod.grid(row=5,column=2)
Button_equal.grid(row=5,column=3)
Button_clear.grid(row=6,column=0,columnspan=4)
op.mainloop()
