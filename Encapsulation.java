import java.security.spec.ECField;

class Exp {
   private String Name,email;
   private int age;
   private long Account_num;
   public void setter(String Name,int age)
   {
       this.Name=Name;
       this.age=age;
   }
   public void set_acct(long acct)
   {
       this.Account_num=acct;
   }
   public void set_email(String mail)
   {
       this.email=mail;
   }
   public void getter()
   {
       System.out.println("Hi "+Name+" your age is "+age );
   }
   public long get_acct()
   {
       return Account_num;
   }
   public String get_email()
   {
       return  email;
   }
}
class Encapsulation
{
    public static void main(String[] args) {
        Exp obj=new Exp();
        obj.setter("Muthu",23);
        obj.set_acct(42344843);
        obj.set_email("muthu@gmail.com");
        obj.getter();
        System.out.println("Your account number: "+obj.get_acct());
        System.out.println("Your email: "+obj.get_email());
    }
}
