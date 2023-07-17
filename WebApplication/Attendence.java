package basicWebApplication;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
// import java.sql.ResultSet;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class Attendence
 */
@WebServlet("/Attendence")
public class Attendence extends HttpServlet {
//	private static final String selectquery="SELECT * FROM registration";
	private static final String InsertQuery="Insert into attendence(Name,RegisterNumber,Attendence)Values(?,?,?)";
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Attendence() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter pw=response.getWriter();
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/student","root","");
			PreparedStatement ps=con.prepareStatement(InsertQuery);
			String Name=request.getParameter("Name");
			String Reg=request.getParameter("reg");
			String Attend=request.getParameter("atd");
			ps.setString(1, Name);
			ps.setString(2, Reg);
			ps.setString(3, Attend);
			ps.execute();
		    int count=ps.executeUpdate();
		    if(count==0)
			{
				pw.println("Stored not Successfull");
			}
			else
			{
				pw.println("Stored Successfull");
			}
		}
	catch(Exception e)
		{
			pw.println(e.getMessage());
			e.printStackTrace();
		}
		pw.close();
	}
		

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
