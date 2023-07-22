package com.example.myloginapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;
// Why import had an empty line there ? WTF

public class registerActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        // This is the registration menu and here you can see a button along with textfields
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        // Simplified variable definition, if you have multiple TextView you should do it like this or for other data types
        TextView completeregisterBtn, username, password, password_2, email;
        // Using a object to fulfill it's purpose and make this file segment shorter too for clean code
        RegisterHandle registerHandle;

        completeregisterBtn = findViewById(R.id.Completeregisterbtn);
        username = findViewById(R.id.username);
        //password and password_2 is presumably for verifying your choice
        password = findViewById(R.id.password);
        password_2 = findViewById(R.id.password_2);
        email = findViewById(R.id.emailField);
        registerHandle = new RegisterHandle();


        //This event will send the registration data to the server upon clicking the button
        completeregisterBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intentMain = new Intent(getApplicationContext(), registerActivity.class);
                startActivity(intentMain);
                finish();

                registerHandle.regUser(username.getText().toString(), password.getText().toString(), password_2.getText().toString(), email.getText().toString(), getApplicationContext());
            }
        });
    }
}
