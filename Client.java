/***************
 * 
 * MPG Client, for testing purpose.
 * By:Xiaoyu Ge
 * 
 */

import java.net.*;
import java.io.*;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class Client
{
    public static void main(String [] args) throws JSONException
   {


       String[] keysArr = {"56aa371be4b08b9a8d5734db","4fceea171983d5d06c3e9823", "4bf58dd8d48988d1e1931735", "4bf58dd8d48988d1e2931735", "4bf58dd8d48988d1e4931735",
            "4bf58dd8d48988d17c941735", "52e81612bcbc57f1066b79e7", "4bf58dd8d48988d18e941735", "5032792091d4c4b30a586d5c", "52e81612bcbc57f1066b79ef",
            "52e81612bcbc57f1066b79e8", "56aa371be4b08b9a8d573532", "4bf58dd8d48988d1f1931735", "52e81612bcbc57f1066b79ea", "4deefb944765f83613cdba6e",
            "52e81612bcbc57f1066b79e6" , "5642206c498e4bfca532186c", "52e81612bcbc57f1066b79eb", "4bf58dd8d48988d17f941735", "4bf58dd8d48988d181941735",
            "4bf58dd8d48988d1e5931735", "4bf58dd8d48988d1f2931735", "4bf58dd8d48988d1e3931735", "507c8c4091d498d9fc8c67a9", "56aa371be4b08b9a8d573514",
            "4bf58dd8d48988d1f4931735", "52e81612bcbc57f1066b79e9", "52e81612bcbc57f1066b79ec", "56aa371be4b08b9a8d5734f9", "4bf58dd8d48988d184941735",
            "4bf58dd8d48988d182941735", "56aa371be4b08b9a8d573520", "4bf58dd8d48988d193941735", "4bf58dd8d48988d17b941735" ,
            
            "4bf58dd8d48988d198941735", "4bf58dd8d48988d197941735", "4bf58dd8d48988d1af941735", "4bf58dd8d48988d1b1941735", "4bf58dd8d48988d1a1941735",
            "4bf58dd8d48988d1a0941735", "4bf58dd8d48988d1b2941735", "4bf58dd8d48988d1a5941735", "4bf58dd8d48988d1a7941735", "4bf58dd8d48988d1aa941735",
            "4bf58dd8d48988d1a9941735", "4bf58dd8d48988d1a3941735", "4bf58dd8d48988d1b4941735", "4bf58dd8d48988d1ac941735", "4bf58dd8d48988d1a2941735",
            "4bf58dd8d48988d1b0941735", "4bf58dd8d48988d1a8941735", "4bf58dd8d48988d1a6941735", "4bf58dd8d48988d1b3941735", "4bf58dd8d48988d141941735",
            "4bf58dd8d48988d1ab941735", "4bf58dd8d48988d1ad941735", "4bf58dd8d48988d1ae941735" ,
            
            "52f2ab2ebcbc57f1066b8b3b", "5267e4d9e4b0ec79466e48c6", "5267e4d9e4b0ec79466e48c9", "5267e4d9e4b0ec79466e48c7", "5267e4d9e4b0ec79466e48d1",
            "5267e4d9e4b0ec79466e48c8", "52741d85e4b0d5d1e3c6a6d9", "52f2ab2ebcbc57f1066b8b54", "5267e4d8e4b0ec79466e48c5",

            "503288ae91d4c4b30a586d67", "4bf58dd8d48988d1c8941735", "4bf58dd8d48988d14e941735", "4bf58dd8d48988d142941735", "4bf58dd8d48988d169941735",
            "52e81612bcbc57f1066b7a01", "4bf58dd8d48988d1df931735", "4bf58dd8d48988d179941735", "4bf58dd8d48988d16a941735", "52e81612bcbc57f1066b7a02",
            "52e81612bcbc57f1066b79f1", "4bf58dd8d48988d16b941735", "4bf58dd8d48988d143941735", "52e81612bcbc57f1066b7a0c", "52e81612bcbc57f1066b79f4",
            "4bf58dd8d48988d16c941735", "4bf58dd8d48988d128941735", "4bf58dd8d48988d16d941735", "4bf58dd8d48988d17a941735", "4bf58dd8d48988d144941735",
            "5293a7d53cf9994f4e043a45", "4bf58dd8d48988d1e0931735", "52e81612bcbc57f1066b7a00", "52e81612bcbc57f1066b79f2", "52f2ae52bcbc57f1066b8b81",
            "4bf58dd8d48988d146941735", "4bf58dd8d48988d1d0941735", "4bf58dd8d48988d147941735", "4bf58dd8d48988d148941735", "4bf58dd8d48988d108941735",
            "4bf58dd8d48988d109941735", "52e81612bcbc57f1066b7a05", "4bf58dd8d48988d10b941735", "4bf58dd8d48988d16e941735", "4edd64a0c7ddd24ca188df1a",
            "52e81612bcbc57f1066b7a09", "4bf58dd8d48988d120951735", "56aa371be4b08b9a8d57350b", "4bf58dd8d48988d1cb941735", "4bf58dd8d48988d10c941735",
            "4d4ae6fc7a7b7dea34424761", "55d25775498e9f6a0816a37a", "4bf58dd8d48988d155941735", "4bf58dd8d48988d10d941735", "4c2cd86ed066bed06c3c5209",
            "4bf58dd8d48988d10e941735", "52e81612bcbc57f1066b79ff", "52e81612bcbc57f1066b79fe", "4bf58dd8d48988d16f941735", "52e81612bcbc57f1066b79fa", 
            "4bf58dd8d48988d10f941735", "52e81612bcbc57f1066b7a06", "4bf58dd8d48988d110941735", "52e81612bcbc57f1066b79fd", "4bf58dd8d48988d112941735", 
            "4bf58dd8d48988d1be941735", "4bf58dd8d48988d1bf941735", "4bf58dd8d48988d1c0941735", "4bf58dd8d48988d1c1941735", "4bf58dd8d48988d115941735", 
            "52e81612bcbc57f1066b79f9", "4bf58dd8d48988d1c2941735", "52e81612bcbc57f1066b79f8", "56aa371be4b08b9a8d573508", "4bf58dd8d48988d1ca941735", 
            "52e81612bcbc57f1066b7a04", "4def73e84765ae376e57713a", "56aa371be4b08b9a8d5734c7", "4bf58dd8d48988d1c4941735", "5293a7563cf9994f4e043a44", 
            "4bf58dd8d48988d1bd941735", "4bf58dd8d48988d1c5941735", "4bf58dd8d48988d1c6941735", "4bf58dd8d48988d1ce941735", "56aa371be4b08b9a8d57355a", 
            "4bf58dd8d48988d1c7941735", "4bf58dd8d48988d1dd931735", "4bf58dd8d48988d1cd941735", "4bf58dd8d48988d14f941735", "4bf58dd8d48988d150941735", 
            "5413605de4b0ae91d18581a9", "4bf58dd8d48988d1cc941735", "4bf58dd8d48988d158941735", "4bf58dd8d48988d1dc931735", "56aa371be4b08b9a8d573538", 
            "4f04af1f2fb6e1c99f3db0bb", "52e928d0bcbc57f1066b7e96", "4bf58dd8d48988d1d3941735", "4bf58dd8d48988d14c941735",

            "4bf58dd8d48988d116941735", "50327c8591d4c4b30a586d5d", "4bf58dd8d48988d121941735", "53e510b7498ebcb1801b55d4", "4bf58dd8d48988d11f941735",
            "4bf58dd8d48988d11a941735", "4bf58dd8d48988d1d4941735", "4bf58dd8d48988d1d6941735",

            "4f4528bc4b90abdf24c9de85", "52e81612bcbc57f1066b7a27", "52e81612bcbc57f1066b7a28", "56aa371be4b08b9a8d573544", "4bf58dd8d48988d1e2941735",
            "56aa371be4b08b9a8d57355e", "52e81612bcbc57f1066b7a22", "4bf58dd8d48988d1df941735", "4bf58dd8d48988d1e4941735", "56aa371be4b08b9a8d57353b",
            "56aa371be4b08b9a8d573562", "50aaa49e4b90af0d42d5de11", "56aa371be4b08b9a8d573511", "4bf58dd8d48988d15c941735", "52e81612bcbc57f1066b7a12",
            "4bf58dd8d48988d1e5941735", "4bf58dd8d48988d15b941735", "4bf58dd8d48988d15f941735", "52e81612bcbc57f1066b7a0f", "52e81612bcbc57f1066b7a23",
            "56aa371be4b08b9a8d573547", "4bf58dd8d48988d15a941735", "52e81612bcbc57f1066b7a11", "4bf58dd8d48988d1e0941735", "4bf58dd8d48988d160941735",
            "50aaa4314b90af0d42d5de10", "4bf58dd8d48988d161941735", "4bf58dd8d48988d15d941735", "4eb1d4d54b900d56c88a45fc", "52e81612bcbc57f1066b7a21",
            "52e81612bcbc57f1066b7a13", "4bf58dd8d48988d162941735", "52e81612bcbc57f1066b7a14", "4bf58dd8d48988d163941735", "52e81612bcbc57f1066b7a25",
            "4bf58dd8d48988d1e7941735", "4bf58dd8d48988d164941735", "4bf58dd8d48988d15e941735", "52e81612bcbc57f1066b7a29", "52e81612bcbc57f1066b7a26",
            "56aa371be4b08b9a8d573541", "4eb1d4dd4b900d56c88a45fd", "50328a4b91d4c4b30a586d6b", "4bf58dd8d48988d165941735", "4bf58dd8d48988d166941735",
            "4bf58dd8d48988d1e9941735", "4eb1baf03b7b2c5b1d4306ca", "530e33ccbcbc57f1066bbfe4", "52e81612bcbc57f1066b7a10", "4bf58dd8d48988d159941735",
            "52e81612bcbc57f1066b7a24", "4bf58dd8d48988d1de941735", "5032848691d4c4b30a586d61", "56aa371be4b08b9a8d573560", "56aa371be4b08b9a8d5734c3",
            "4fbc1be21983fc883593e321", 
            
            "4e52d2d203646f7c19daa8ae", "4bf58dd8d48988d173941735", "56aa371be4b08b9a8d5734cf", "4bf58dd8d48988d130941735", "56aa371be4b08b9a8d573517",
            "52e81612bcbc57f1066b7a35", "52e81612bcbc57f1066b7a34", "4bf58dd8d48988d1ff931735", "52e81612bcbc57f1066b7a32", "4e0e22f5a56208c4ea9a85a0",
            "52e81612bcbc57f1066b7a37", "4bf58dd8d48988d171941735", "4eb1bea83b7b6f98df247e06", "4eb1daf44b900d56c88a4600", "4f4534884b9074f6e4fb0174",
            "4bf58dd8d48988d126941735", "56aa371be4b08b9a8d5734d7", "4bf58dd8d48988d12f941735", "4bf58dd8d48988d104941735", "4e52adeebd41615f56317744",
            "50328a8e91d4c4b30a586d6c", "4bf58dd8d48988d124941735", "4c38df4de52ce0d596b336e1", "4bf58dd8d48988d172941735", "5310b8e5bcbc57f1066bcbf1",
            "5032856091d4c4b30a586d63", "52f2ab2ebcbc57f1066b8b57", "4bf58dd8d48988d13b941735", "52e81612bcbc57f1066b7a33", "4bf58dd8d48988d131941735",
            "52e81612bcbc57f1066b7a31", "4cae28ecbf23941eb1190695", "52e81612bcbc57f1066b7a36", "56aa371be4b08b9a8d5734c5", "4bf58dd8d48988d14b941735",

            "5032891291d4c4b30a586d68", "4bf58dd8d48988d103941735", "4f2a210c4b9023bd5841ed28", "4d954b06a243a5684965b473", "52f2ab2ebcbc57f1066b8b55",

            "52f2ab2ebcbc57f1066b8b56", "5267e446e4b0ec79466e48c4", "4bf58dd8d48988d116951735", "4bf58dd8d48988d127951735", "52f2ab2ebcbc57f1066b8b43",
            "52f2ab2ebcbc57f1066b8b44", "56aa371be4b08b9a8d5734d3", "4bf58dd8d48988d124951735", "52f2ab2ebcbc57f1066b8b32", "4bf58dd8d48988d10a951735",
            "56aa371be4b08b9a8d5734cb", "52f2ab2ebcbc57f1066b8b40", "52f2ab2ebcbc57f1066b8b42", "4bf58dd8d48988d115951735", "4bf58dd8d48988d1f1941735",
            "4bf58dd8d48988d114951735", "4bf58dd8d48988d11a951735", "5453de49498eade8af355881", "4eb1bdf03b7b55596b4a7491", "4bf58dd8d48988d117951735",
            "4eb1c1623b7b52c0e1adc2ec", "4f04ae1f2fb6e1c99f3db0ba", "52f2ab2ebcbc57f1066b8b2a", "52f2ab2ebcbc57f1066b8b2d", "52f2ab2ebcbc57f1066b8b31",
            "4bf58dd8d48988d103951735", "52f2ab2ebcbc57f1066b8b18", "5454144b498ec1f095bff2f2", "4d954b0ea243a5684a65b473", "4bf58dd8d48988d10c951735",
            "52f2ab2ebcbc57f1066b8b17", "5032850891d4c4b30a586d62", "4f4532974b9074f6e4fb0104", "4bf58dd8d48988d1f6941735", "4bf58dd8d48988d1f4941735",
            "52dea92d3cf9994f4e043dbb", "52f2ab2ebcbc57f1066b8b1a", "4bf58dd8d48988d10f951735", "52f2ab2ebcbc57f1066b8b1d", "5032872391d4c4b30a586d64",
            "4bf58dd8d48988d122951735", "56aa371be4b08b9a8d573554", "5454152e498ef71e2b9132c6", "52f2ab2ebcbc57f1066b8b26", "56aa371be4b08b9a8d573523",
            "503287a291d4c4b30a586d65", "52f2ab2ebcbc57f1066b8b3a", "52f2ab2ebcbc57f1066b8b16", "4bf58dd8d48988d1f7941735", "56aa371be4b08b9a8d573505",
            "4bf58dd8d48988d11b951735", "4bf58dd8d48988d1f9941735", "52f2ab2ebcbc57f1066b8b24", "52f2ab2ebcbc57f1066b8b1c", "4bf58dd8d48988d1f8941735",
            "4bf58dd8d48988d18d941735", "4eb1c0253b7b52c0e1adc2e9", "4bf58dd8d48988d113951735", "4bf58dd8d48988d128951735", "52f2ab2ebcbc57f1066b8b19",
            "4bf58dd8d48988d112951735", "54541900498ea6ccd0202697", "52f2ab2ebcbc57f1066b8b2c", "4bf58dd8d48988d1fb941735", "545419b1498ea6ccd0202f58",
            "50aaa5234b90af0d42d5de12", "52f2ab2ebcbc57f1066b8b36", "4bf58dd8d48988d1f0941735", "4bf58dd8d48988d111951735", "52f2ab2ebcbc57f1066b8b25",
            "52f2ab2ebcbc57f1066b8b33", "4bf58dd8d48988d1fc941735", "52f2ab2ebcbc57f1066b8b3f", "52f2ab2ebcbc57f1066b8b2b", "52f2ab2ebcbc57f1066b8b1e",
            "52f2ab2ebcbc57f1066b8b38", "52f2ab2ebcbc57f1066b8b29", "52c71aaf3cf9994f4e043d17", "50be8ee891d4fa8dcc7199a7", "52f2ab2ebcbc57f1066b8b3c",
            "52f2ab2ebcbc57f1066b8b27", "4bf58dd8d48988d1ff941735", "4f04afc02fb6e1c99f3db0bc", "56aa371be4b08b9a8d57354a", "5032833091d4c4b30a586d60",
            "4bf58dd8d48988d1fe941735", "4f04aa0c2fb6e1c99f3db0b8", "4f04ad622fb6e1c99f3db0b9", "4d954afda243a5684865b473", "52f2ab2ebcbc57f1066b8b2f",
            "52f2ab2ebcbc57f1066b8b22", "52f2ab2ebcbc57f1066b8b35", "4bf58dd8d48988d121951735", "52f2ab2ebcbc57f1066b8b34", "52f2ab2ebcbc57f1066b8b23",
            "5032897c91d4c4b30a586d69", "4bf58dd8d48988d100951735", "4eb1bdde3b7b55596b4a7490", "554a5e17498efabeda6cc559", "52f2ab2ebcbc57f1066b8b20", 
            "52f2ab2ebcbc57f1066b8b3d", "52f2ab2ebcbc57f1066b8b28", "5032885091d4c4b30a586d66", "4bf58dd8d48988d10d951735", "52f2ab2ebcbc57f1066b8b37",
            "4f4531084b9074f6e4fb0101", "56aa371be4b08b9a8d573552", "4bf58dd8d48988d110951735", "52f2ab2ebcbc57f1066b8b1f", "52f2ab2ebcbc57f1066b8b39",
            "4bf58dd8d48988d1fd941735", "56aa371be4b08b9a8d573566", "4bf58dd8d48988d123951735", "52f2ab2ebcbc57f1066b8b41", "52f2ab2ebcbc57f1066b8b1b",
            "4bf58dd8d48988d1ed941735", "4bf58dd8d48988d1f2941735", "52f2ab2ebcbc57f1066b8b21", "4f04b1572fb6e1c99f3db0bf", "5032781d91d4c4b30a586d5b",
            "4d1cf8421a97d635ce361c31", "4bf58dd8d48988d1de931735", "4bf58dd8d48988d101951735", "4bf58dd8d48988d1f3941735", "4f04b08c2fb6e1c99f3db0bd",
            "52f2ab2ebcbc57f1066b8b30", "56aa371be4b08b9a8d57355c", "4bf58dd8d48988d10b951735", "4bf58dd8d48988d126951735", "52e816a6bcbc57f1066b7a54",
            "52f2ab2ebcbc57f1066b8b2e", 

           "4bf58dd8d48988d1ed931735", "4e4c9077bd41f78e849722f9", "4bf58dd8d48988d12d951735", "52f2ab2ebcbc57f1066b8b4b", "4bf58dd8d48988d1fe931735",
            "52f2ab2ebcbc57f1066b8b4f", "52f2ab2ebcbc57f1066b8b50", "55077a22498e5e9248869ba2", "4bf58dd8d48988d1f6931735", "56aa371ce4b08b9a8d57356e",
            "4bf58dd8d48988d1fa931735", "52f2ab2ebcbc57f1066b8b4c", "4bf58dd8d48988d1fc931735", "4bf58dd8d48988d1fd931735", "4f2a23984b9023bd5841ed2c", 
            "4e74f6cabd41c4836eac4c31", "56aa371be4b08b9a8d57353e", "52f2ab2ebcbc57f1066b8b53", "4bf58dd8d48988d1ef941735", "4d954b16a243a5684b65b473",
            "4bf58dd8d48988d1f9931735", "52f2ab2ebcbc57f1066b8b52", "53fca564498e1a175f32528b", "4bf58dd8d48988d130951735", "52f2ab2ebcbc57f1066b8b4d", 
            "52f2ab2ebcbc57f1066b8b4e", "4f4530164b9074f6e4fb00ff", "4bf58dd8d48988d129951735", "52f2ab2ebcbc57f1066b8b51", "54541b70498ea6ccd0204bff",
            "4f04b25d2fb6e1c99f3db0c0", "52f2ab2ebcbc57f1066b8b4a"
            };



      String serverName = "71.199.97.2";      
      int port = 7777;
      
        try{
			String str="37.797666,-122.430658,20,8,;,1,;,5,;,FoodLover,NightLover,OutdoorsLover,shoppingLover";
            String input[] = str.split(";");
            //System.out.println("input: "+input[0]+" - "+input[1]+" - "+input[2]+" - "+input[3]+"==");
            String details[] = input[0].split(",");
            String lat = details[0];
            String lon = details[1];
            String r = details[2];
            String k = details[3];

            String[] groupIdArr = input[1].split(",");
            String[] modelIdArr = input[2].split(",");

            String groupId = "";
            String modelId = "";
            String profile = "";
            int i;
            //It means profile is defined if input length = 4
            //System.out.println("No of args: "+args.length);
            if(input.length==4){
              groupId += "1,2,3,4,5,6,7,8,9,10";
              /*for(i=1;i<10;i++){
                groupId += i + ',';    
              }
              groupId += i;*/
            }
            else{
              for(i = 1; i < groupIdArr.length-1;i++){
              groupId += groupIdArr[i] + ',';
              }
              groupId += groupIdArr[i];              
            }

            for(i = 1; i < modelIdArr.length-1;i++){
            modelId += modelIdArr[i] + ',';
            }
            modelId += modelIdArr[i];
            //System.out.println("input length: "+input.length);
            String[] profileArr;
            if(input.length==4){
              profileArr = input[3].split(",");
              profile = profileArr[1];
            }
            
            /*  
            System.out.println("lat: "+lat);
            System.out.println("lon: "+lon);
            System.out.println("K: "+k);
            System.out.println("groupId: "+groupId);
            System.out.println("modelId: "+modelId);
            */  
            String selfProfile;
            if(args.length==3){
              //System.out.println("3 arguments provided");
              String biasArr[] = args[2].split(",");
              //System.out.println(biasArr[12]);
              //String keysArr[] = args[3].split(",");
              selfProfile = "true,";
              for(i=0;i<biasArr.length-1;i++){
                selfProfile += keysArr[i]+","+biasArr[i]+",";
              }
              selfProfile += keysArr[i]+","+biasArr[i];
            }
            else{
              //System.out.println("1 arguments provided");
              selfProfile = "false";
            }
			//System.out.println(args[0]);
            JSONObject ret = new JSONObject(args[0]);
            /*JSONObject ret = new JSONObject();
             ret.put("UserLocation", lat+";"+lon);
            ret.put("topK", k);
            ret.put("radius", r);
            ret.put("groupIds", groupId);
            ret.put("Models", "0");
            ret.put("prefDivNum","1");
            ret.put("prefDivAlpha0","0.5");
            ret.put("prefDivDelta0","0.2");
            ret.put("prefDivSigma0","0.4");
            ret.put("prefDivLambda0","0.6");
            ret.put("prefDivRouteLength","4");
            ret.put("AllVenue", "TRUE");

            if(input.length==4){
              ret.put("profile", profile);
              //System.out.println("profile: "+profile);
            }
            else{
              ret.put("profile", "no profile");
            }

            //added coz there is something wrong with backend when sent selfProfile, false
            if(args.length==3){
                ret.put("selfProfile", selfProfile);
            }
            
*/
           //System.out.println("JSONObject: "+ret.toString());
           
           //System.out.println("Connecting to " + serverName + " on port " + port);
           Socket client = new Socket(serverName, port);
           //System.out.println("Just connected to "  + client.getRemoteSocketAddress());
           OutputStream outToServer = client.getOutputStream();
           DataOutputStream out = new DataOutputStream(outToServer);
           //System.out.println("ret.toString() "  + ret.toString());       
           out.writeUTF(ret.toString());
		   //out.writeUTF(args[0]);
           InputStream inFromServer = client.getInputStream();
           DataInputStream in = new DataInputStream(inFromServer);
           //System.out.println("Server says " + in.readUTF());
           System.out.println(in.readUTF());
            client.close();
          }
          catch(IOException e){
             e.printStackTrace();
          }

          


   }
}