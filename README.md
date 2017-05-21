# RateMyClass
RateMyClass is an open source project created at Drexel University that allow students to view score distribution across each classes and difficulty level. Database is anonymously crowdsource by Drexel Students through submitting grade they receive from a class in order to view grade of other classes. The webapp will automatically parse through SQL database in order to compute class average, score distribution, sample size and then rank the class as easy, medium or hard. The webapp is also built on a JavaScript sorting algorithm to sort a list of classes from easiest to hardest for each major, then display it to the client side using chartJS framework. All functionalities are automated, thus allowing instantaneous data update within seconds.  

## How To Use 
### 1. Register an account. 
Account must be registered with a Drexel University's email address. This is for verification purpose so that grade are only inputted from Drexel students, and not from outsiders. Attempt to register with a non-Drexel University email will result in failure. 
2. Create an anonymous username and password. A 4-digit PIN code will be generated and send to your Drexel's email address. From now on, you can log in with these credentials. If you forgot your username or password, click "Forgot My Password" and an email will be send to your Drexel Universit's email address containing your username and password. 
3. Input at least 3 grades (e.g A, B, B+) for 3 classes of which you have taken (e.g CS171, CS172, CS164). After you have done so, you will be redirected to a dashboard. 
4. Functionalities:
  - Dashboard is where you can see the grade distribution across all colleges within the University (e.g College of Arts and Science, College of Computing and Informatics...etc.) 
  - Search bar is where you can find a class's name. If you cannot find a class's name when search, let us know through the contact form on the Settings page. Certain classes such as Independent Study or Special Topics are not yet entered into our database. At the moment, Ratemyclass only contained classes with high volume of students. 
  - Sorting is where you can choose a major's name (e.g Computer Science) and choose a sorting order (Easiest->Hardest or Hardest->Easiest) and you will be redirected to a page that listed the classes out in your sorting orde
  - Input grade is where you can enter grade for classes you have taken, and you can input as many classes are you want.
  - Settings is where you can change your password, as well as communicating with us if you have any issue using the website through the contact form.
  - Click log out to safely destroy your login session. If you do not click log out, next time you browse, the website will automatically log you onto the dashboard if you don't clear your cache. 
  - In addition to viewing a class's difficulty, Ratemyclass also contains a built in commenting system where you can submit anonymous review for a class. We know that quantitative data alone will not always sufficiently communciate the whole picture. 
  
## Other Important Information
- As this involves data sharing of user scores, Ratemyclass has a Privacy Policy. Check our website for more information. 
- You can only submit your grade once, so make sure you enter the correct grade. This functionality is implemented in PHP to prevent user from submitting multiple grade for the same class, which could lead to skewing the grade data
- The class ranking is built on the following formula: if class average > 3.30, it is easy. If class average > 2.60, it is medium. Below that is hard. This is graded on a 4.0 scale with 4 = A, 3 = B, 2 = C, 1 = D, and 0 = F. For more information, check out Drexel University's official [GPA calculation website.](http://drexel.edu/drexelcentral/transcripts/grades/gpa-calculation/) 


## Contributing
1. Pull/Fork
2. Issue Pull Request
3. Make Issues

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.


## License and Copyright
@Minh Le, Drexel University. This project is licensed under the [GNU LGPLv3](LICENSE) License.
