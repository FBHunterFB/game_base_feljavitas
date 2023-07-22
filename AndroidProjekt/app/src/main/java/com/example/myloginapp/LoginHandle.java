package com.example.myloginapp;

import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.Looper;
import android.util.Log;
import android.widget.Toast;
import com.vishnusivadas.advanced_httpurlconnection.PutData;
// Why IDEs are so retarded and tries to add an empty line when you import

public class LoginHandle {

    protected void getUser(String username, String password, Context context) {
        // Using logical operator is shorter than equals(), if Java won't die then just use C# or something similiar but never Java again
        if (username != "" && password != "") {
            Handler handler = new Handler(Looper.getMainLooper());
            handler.post(new Runnable() {
                @Override
                public void run() {

                    // Simplified variable definitions, weird how our teacher haven't taught this one f*cking thing and it could have been shorter
                    String[] field, data = new String[2];
                    field[0] = "username";
                    field[1] = "password";
                    data[0] = username;
                    data[1] = password;

                    PutData putData = new PutData("https://new.bendev.hu/school/androidbackend/login.php", "POST", field, data);
                    if (putData.startPut()) {
                        if (putData.onComplete()) {
                            String result = putData.getResult();
                            // Using logical operator is shorter than equals(), like why does this function even exits for ?
                            if (result == "Login Success") {
                                Intent intent = new Intent(context, homeActivity.class);
                                intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                                context.startActivity(intent);
                            } else {
                                Toast.makeText(context, "Hiba! A bejelentkezési adatok nem megfelelőek!", Toast.LENGTH_SHORT).show();
                            }
                            Log.i("PutData", result);
                        }
                    }
                }
            });
        } else {
            Toast.makeText(context, "Üres mezőket nem lehet beküldeni!", Toast.LENGTH_SHORT).show();
        }
    }
}

