/***************
 * 
 * MPG Client, for testing purpose.
 * By:Xiaoyu Ge
 * 
 */

import java.net.*;
import java.io.*;

import org.json.JSONException;
import org.json.JSONObject;


public class MPGClient
{
   public static void main(String [] args) throws JSONException
   {
	  
      String serverName = "71.199.97.2";      
      int port = 8888;
	  
	  
      //String serverName = "127.0.0.1";      
      //int port = 8888;
      
      try
      {
          System.out.println("Please enter your type of POIs you are interested:"); 
          System.out.println("1-Arts & Entertainment \n2-College & University \n3-Event \n4-Food \n5-Nightlife Spot ");
          System.out.println("6-Outdoors & Recreation \n7-Professional & Other Places \n8-Residence \n9-Shop & Service \n10-Travel & Transport ");
          BufferedReader br = new BufferedReader(new InputStreamReader(System.in));  
          String[] groupIdArr =  br.readLine().split(" ");
          String groupId = "";
          
          System.out.println("Please enter the number of models you are interested (0-9): ");   
          BufferedReader br1 = new BufferedReader(new InputStreamReader(System.in));  
          String[] modelIdArr =  br1.readLine().split(" ");
          String modelId = "";
          
          System.out.println("Please enter the K:"); 
          BufferedReader br2 = new BufferedReader(new InputStreamReader(System.in));  
          String K = br2.readLine();
          
          System.out.println("Please enter the radius (in km): "); 
          BufferedReader br3 = new BufferedReader(new InputStreamReader(System.in));  
          String r = br3.readLine();
          
          System.out.println("statistics for all venue? (yes or no)"); 
          BufferedReader br4 = new BufferedReader(new InputStreamReader(System.in));  
          String runAll = br3.readLine();
          
         for(int i = 0; i < groupIdArr.length;i++){
        	 if(i != groupIdArr.length-1)
        		 groupId += groupIdArr[i] + ',';
        	 else
        		 groupId += groupIdArr[i];
         }
    	
         for(int i = 0; i < modelIdArr.length;i++){
        	 if(i != modelIdArr.length-1)
        		 modelId += modelIdArr[i] + ',';
        	 else
        		 modelId += modelIdArr[i];       	 
         }

    	 JSONObject ret = new JSONObject();
    	 ret.put("UserLocation", "40.770039; -73.826566");
    	 ret.put("topK", K);
    	 ret.put("radius", r);
    	 ret.put("groupIds", groupId);
    	 ret.put("Models", modelId);
    	 
    	 ret.put("AllVenue", "FALSE"); // shown statistics information for all venues in the range query. 
    	 // results would be consider as the 10th model in the feedback from the server. 
    	 //ret.put("AllVenue", "FALSE"); 
    	 
    	 ret.put("profile","ArtLover"); //support five different profiles ArtLover FoodLover NightLover OutdoorsLover shoppingLover 
    	 // Only add this object "profile" to the json query,  if you wish to change the profile
    	 
    	 // Below is dummy code need to replace keys and values with actual value for modify profile.
    	 //ret.put("selfProfile","true or false, key1, value1, key2,value2 "..........);
    	 
         System.out.println("Connecting to " + serverName + " on port " + port);
         Socket client = new Socket(serverName, port);
         System.out.println("Just connected to "  + client.getRemoteSocketAddress());
         OutputStream outToServer = client.getOutputStream();
         DataOutputStream out = new DataOutputStream(outToServer);
         //System.out.println("ret.toString() "  + ret.toString());       
         out.writeUTF(ret.toString());
         InputStream inFromServer = client.getInputStream();
         DataInputStream in = new DataInputStream(inFromServer);
         System.out.println("Server says " + in.readUTF());

         client.close();
      }catch(IOException e)
      {
         e.printStackTrace();
      }
   }
}