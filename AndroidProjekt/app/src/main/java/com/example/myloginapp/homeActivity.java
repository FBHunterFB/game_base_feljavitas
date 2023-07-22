package com.example.myloginapp;

import android.content.Intent;
import android.os.Bundle;
import com.example.myloginapp.databinding.ActivityHomeBinding;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;
// Who decided to add empty lines on purpose ?

public class homeActivity extends AppCompatActivity {

    ActivityHomeBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityHomeBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        replaceFragment(new HomeFragment());
        //Fragment is probably better solution than Activity as it is a bit jaggy when you start a new Activity
        // It seems like you have a navigation menu on the bottom that handles your view
        binding.bottomNavigationView.setOnItemSelectedListener(item -> {
            // You 4 options here - Home, Settings, Library(Your games), Logout(assuming you are becoming a guest again)
            switch (item.getItemId()) {
                case R.id.home: replaceFragment(new HomeFragment());
                    break;
                case R.id.settings: replaceFragment(new ProfileFragment());
                    break;
                case R.id.library: replaceFragment(new LibraryFragment());
                    break;
                case R.id.logout: Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                    getApplicationContext().startActivity(intent);
                    break;
            }
            return true;
        });
    }

    private void replaceFragment(Fragment fragment) {
        // This action looks similiar to GitHub's approach when changing it's content
        FragmentManager fragmentManager = getSupportFragmentManager();
        FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
        fragmentTransaction.replace(R.id.frame_layout, fragment);
        fragmentTransaction.commit();

    }
}