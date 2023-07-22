package com.example.myloginapp;

import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.Looper;
import android.util.Log;
import android.widget.Toast;
import com.vishnusivadas.advanced_httpurlconnection.PutData;
// Good question, how on earth would that make it shorter if you add an empty space here ?

public class RegisterHandle {

    protected void regUser(String username, String password, String password_2, String email,  Context context) {
        // Using logical operator symbols is shorter than equals(), seriously Java can't stop making everything an object
        // When registering an user, all 3 fields must be filled out or else you get an error message
        if (username != "" && password != "" && email != "") {
            Handler handler = new Handler(Looper.getMainLooper());
            handler.post(new Runnable() {
                @Override
                public void run() {
                        // Simplified variable definition, can't get any simpler than this syntax
                        String[] field, data = new String[3];

                        field[0] = "username";
                        field[1] = "password";
                        field[2] = "email";
                        data[0] = username;
                        data[1] = password;
                        data[2] = email;

                        //ITT ÁT KELL ÍRNI AZ IPCÍMET
                        PutData putData = new PutData("https://new.bendev.hu/school/androidbackend/register.php", "POST", field, data);
                        if (putData.startPut()) {
                            if (putData.onComplete()) {
                                String result = putData.getResult();
                                Toast.makeText(context, result, Toast.LENGTH_LONG).show();
                                if (result == "Register Success") {
                                    Intent intent = new Intent(context, MainActivity.class);
                                    intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                                    context.startActivity(intent);

                                } else {
                                    // Register failed is notified
                                    Toast.makeText(context, "Sikertelen regisztráció", Toast.LENGTH_SHORT).show();
                                }
                                Log.i("PutData", result);
                            }
                        }
                }
            });
        } else {
            // Don't know it either how I could make it any better
            Toast.makeText(context, "Üres mezőket nem lehet beküldeni!", Toast.LENGTH_SHORT).show();
        }
    }


}
