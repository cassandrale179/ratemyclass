#include <iostream>
#include <vector>
#include <fstream>
#include <sstream>
using namespace std;

template <typename T>
void print(vector <T> v){
  for (unsigned int i = 0; i < v.size(); i++){
    cout << v[i] << " ";
  }
}

int main(){

  //create textfile
  ifstream is("CS.txt");
  ofstream os("output.txt");

  //create a list of vectors
  vector <string> v;
  vector <int> whitePos;

  //reading in the file
  string line;
  while(!is.eof()){
    getline(is, line);
    v.push_back(line);
  }


  //create a list of variables
  string information;
  string description;
  string college;
  string repeatStatus;
  vector <string> other;

  for (unsigned int i = 0; i < v.size(); i++){
    if (v[i] == "") whitePos.push_back(i);
  }

  unsigned int j = 0;
  int k = 0;
  while(j < whitePos.size()){
    while(k < whitePos[j]){
      information = "Information: " + v[k]; k++;
      description = "Description: " + v[k]; k++;
      college = v[k]; k++;
      repeatStatus = v[k]; k++;
      while(k < whitePos[j]){
        other.push_back(v[k]);
        k++;
      }
      os << information << endl;
      os << description << endl;
      os << college << endl;
      os << repeatStatus << endl;
      os << "---------------------------------------" << endl;
      k++;
    }
    j++;
  }
}
