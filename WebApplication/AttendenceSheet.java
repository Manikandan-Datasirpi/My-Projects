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
 * Servlet implementation class Attendence
 */
@WebServlet("/AttendenceSheet")
public class AttendenceSheet extends HttpServlet {
	private static final String selectquery="SELECT Name,RegisterNumber FROM registration";
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AttendenceSheet() {
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
		PreparedStatement ps=con.prepareStatement(selectquery);
		ResultSet rs=ps.executeQuery();
		pw.println("<html>");
		pw.println("<head>");
		pw.println("<title>III Year</title>");
		pw.println("<link rel=\"stylesheet\" href=\"style.css\">");
		pw.println("</head>");
		pw.println("<body>");
		pw.println("<h1>Welcome to Department of ComputerSceince</h1>");
		pw.println("<form method=post action=Attendence>");
		pw.println("<table>");
		pw.println("<tr><td>Name</td><td>Register Number</td><td>Present</td><td>Absent</td>");
		while(rs.next())
		{
			pw.println("<tr><td><input type=text name=Name value="+rs.getString(1)+"></td><td><input type=text name=reg value="+rs.getString(2)+"></td><td><input type=checkbox name=atd value=Present></td><td><input type=checkbox name=atd value=Absent></td></tr>");
		}
		pw.println("<tr align=center><td colspan=\"4\"><input type=submit value=Submit name=Submit></td></tr>");
		pw.println("</table>");
		pw.println("</form>");
		pw.println("</body>");
		pw.println("</html>");
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
