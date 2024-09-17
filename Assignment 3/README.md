# Assessment-3

Assume that you are working for a museum that is digitizing its entire collection of artifacts and historical documents. You have been assigned the task of designing an XML-based system to manage and validate the records of these artifacts. The museum's collection spans different categories such as Paintings, Sculptures, Manuscripts, and Historical Objects. Each category has unique attributes that need to be captured and validated.

## Museum System Requirements

The museum's system requires the following structure:

- Each artifact has a Category, ArtifactID, Name, Description, DateAcquired, and Condition.
- For Paintings, the artist's Name and the Year it was painted are required.
- For Sculptures, the Material used and the SculptorName must be included.
- For Manuscripts, the Language and the Author should be specified.
- For Historical Objects, the OriginCountry and the estimated Age in years are required.
- The DateAcquired should always be in the format YYYY-MM-DD, and Condition should be one of these predefined values: "Excellent", "Good", "Fair", "Poor".

## Additional Validation Requirements

Additionally, the museum wants to ensure that the XML document validates the following:

- Each ArtifactID must be unique.
- The Year for paintings cannot be in the future.
- The Condition field must contain only valid values.

## Your Task

1. Design an XML document to capture records for several artifacts from different categories in the museum.

2. Create an XML Schema that:
   - Enforces the correct format for the DateAcquired and Condition.
   - Ensures that the specific attributes (e.g., Material for sculptures, Language for manuscripts) are present depending on the artifact category.
   - Validates the uniqueness of ArtifactID across all categories.