public class Construct {
    String Name="Manikandan";
    int age=21;
    public Construct()
    {
        System.out.println("Welcome to Datasirpi");
    }
    public Construct(String Name,int age)
    {
        this.Name=Name;
        this.age=age;
    }
    public Construct(Construct x)
    {
        this.Name=x.Name;
        this.age=x.age;
    }
    public static void main(String[] args) {
        //Default Constructor
        Construct a=new Construct();

        //Parameterized Constructor
        Construct b =new Construct("Manikandan",21);
        System.out.println(b.Name+","+b.age);

        //Copy Constructor
        Construct c=new Construct(b);
        System.out.println(c.Name+","+c.age);
    }
}
