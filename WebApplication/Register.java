package basicWebApplication;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
 
/**
 * Servlet implementation class Register
 */
@WebServlet("/Register")
public class Register extends HttpServlet {
	private static final String InsertQuery="Insert into registration(Name,RegisterNumber,Department,Phone)Values(?,?,?,?)"; 
	private static final String selectquery="SELECT * FROM registration WHERE RegisterNumber = ?";
	private static final long serialVersionUID = 1L;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Register() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		String Name=request.getParameter("Name").toString();
		String Reg=request.getParameter("reg").toString();
		String Depart=request.getParameter("Depart").toString();
		String phone=request.getParameter("phn").toString();
		PrintWriter pw=response.getWriter();
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/student","root","");
			PreparedStatement ps=con.prepareStatement(selectquery);
			ps.setString(1,Reg );
			ResultSet rs=ps.executeQuery();
			boolean check=true;
			while(rs.next())
				{
				  pw.println("Your Register Number is already exists");
				  check=false; 
			    }
			if(check)
			{
				ps=con.prepareStatement(InsertQuery);
				ps.setString(1, Name);
				ps.setString(2, Reg);
				ps.setString(3, Depart);
				ps.setNString(4, phone);
				int count=ps.executeUpdate();
				if(count==0)
				{
					pw.println("Stored not Successfull");
				}
				else
				{
					pw.println("Stored Successfully");
				}
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
