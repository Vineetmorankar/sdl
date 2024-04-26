sh
Copy code
ruby -v
If it's not installed or you need a specific version, consider using a version manager like RVM or rbenv:

RVM: Follow instructions at RVM Installation.
rbenv: Follow instructions at rbenv Installation.
For Linux (Ubuntu/Debian):
You can install Ruby using the package manager:

sh
Copy code
sudo apt update
sudo apt install ruby-full
Writing the Ruby Program:
Once you have Ruby installed, create a new file (e.g., reverse_name.rb) and write the following Ruby program:

reverse_name.rb
ruby
Copy code
# Ruby program to accept user's first and last name and print them in reverse order

# Function to get user input for first and last name
def get_names
  print "Enter your first name: "
  first_name = gets.chomp

  print "Enter your last name: "
  last_name = gets.chomp

  return first_name, last_name
end

# Function to print names in reverse order with a space
def print_reverse_names(first_name, last_name)
  full_name = "#{first_name} #{last_name}"
  reversed_name = full_name.split.reverse.join(' ')
  puts "Reversed Name: #{reversed_name}"
end

# Main program
def main
  puts "=== Reverse Name Program ==="
  first_name, last_name = get_names
  print_reverse_names(first_name, last_name)
end

# Call the main function to run the program
main
Running the Program:
Save the reverse_name.rb file.
Open a terminal or command prompt.
Navigate to the directory where reverse_name.rb is saved.
Run the Ruby program by typing:
sh
Copy code
ruby reverse_name.rb
The program will ask for your first and last name. Enter them when prompted.
The program will then print the reversed name with a space between the first and last name.
Example Output:
mathematica
Copy code
=== Reverse Name Program ===
Enter your first name: John
Enter your last name: Doe
Reversed Name: Doe John